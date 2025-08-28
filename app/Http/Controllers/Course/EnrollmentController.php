<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;

class EnrollmentController extends Controller
{
    protected $razorpay;

    public function __construct()
    {
        $this->razorpay = new Api(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        );
    }

    /**
     * Display enrolled courses for the authenticated user
     */
    public function index()
    {
        $enrollments = auth()->user()->enrollments()
            ->with(['course' => function ($query) {
                $query->with(['sections' => function ($q) {
                    $q->orderBy('sort_order');
                }, 'sections.lessons' => function ($q) {
                    $q->where('is_published', true)->orderBy('sort_order');
                }]);
            }])
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('enrollments.index', compact('enrollments'));
    }

    /**
     * Show course access page with sections and lesson viewer
     */
    public function show($courseSlug)
    {
        $enrollment = auth()->user()->enrollments()
            ->whereHas('course', function ($query) use ($courseSlug) {
                $query->where('slug', $courseSlug);
            })
            ->where('status', 'active')
            ->with(['course' => function ($query) {
                $query->with(['sections' => function ($q) {
                    $q->orderBy('sort_order');
                }, 'sections.lessons' => function ($q) {
                    $q->where('is_published', true)->orderBy('sort_order');
                }]);
            }])
            ->firstOrFail();

        return view('enrollments.show', compact('enrollment'));
    }

    /**
     * Create order and initiate Razorpay payment
     */
    public function createOrder(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $course = Course::findOrFail($request->course_id);
        
        // Check if user is already enrolled
        $existingEnrollment = auth()->user()->enrollments()
            ->where('course_id', $course->id)
            ->where('status', 'active')
            ->first();

        if ($existingEnrollment) {
            return response()->json([
                'success' => false,
                'message' => 'You are already enrolled in this course'
            ]);
        }

        try {
            DB::beginTransaction();

            // Create order
            $order = Order::create([
                'user_id' => auth()->id(),
                'currency' => $course->currency,
                'amount_cents' => $course->price_cents,
                'discount_cents' => 0,
                'tax_cents' => 0,
                'total_cents' => $course->price_cents,
                'status' => 'pending',
                'gateway' => 'razorpay',
                'gateway_order_id' => '',
                'placed_at' => now(),
            ]);

            // Create order item
            OrderItem::create([
                'order_id' => $order->id,
                'course_id' => $course->id,
                'unit_price_cents' => $course->price_cents,
                'quantity' => 1,
                'line_total_cents' => $course->price_cents,
            ]);

            // Create Razorpay order
            $razorpayOrder = $this->razorpay->order->create([
                'amount' => $course->price_cents,
                'currency' => $course->currency,
                'receipt' => 'order_' . $order->id,
                'notes' => [
                    'course_id' => $course->id,
                    'course_title' => $course->title,
                ]
            ]);

            // Update order with Razorpay order ID
            $order->update([
                'gateway_order_id' => $razorpayOrder->id
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'order_id' => $order->id,
                'razorpay_order_id' => $razorpayOrder->id,
                'amount' => $course->price_cents,
                'currency' => $course->currency,
                'key' => config('services.razorpay.key'),
                'course' => [
                    'title' => $course->title,
                    'price' => number_format($course->price_cents / 100, 2),
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Order creation failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to create order. Please try again.'
            ], 500);
        }
    }

    /**
     * Handle successful payment and create enrollment
     */
    public function store(Request $request)
    {
        // Handle free course enrollment
        if ($request->has('is_free') && $request->is_free) {
            $request->validate([
                'course_id' => 'required|exists:courses,id',
            ]);

            try {
                DB::beginTransaction();

                $course = Course::findOrFail($request->course_id);
                
                // Check if user is already enrolled
                $existingEnrollment = auth()->user()->enrollments()
                    ->where('course_id', $course->id)
                    ->where('status', 'active')
                    ->first();

                if ($existingEnrollment) {
                    return response()->json([
                        'success' => false,
                        'message' => 'You are already enrolled in this course'
                    ]);
                }

                // Create free enrollment
                $enrollment = Enrollment::create([
                    'user_id' => auth()->id(),
                    'course_id' => $course->id,
                    'source' => 'admin_grant',
                    'status' => 'active',
                    'activated_at' => now(),
                ]);

                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Successfully enrolled in the course!',
                    'redirect_url' => route('enrollments.show', $course->slug)
                ]);

            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Free enrollment failed: ' . $e->getMessage());
                
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to enroll in course. Please try again.'
                ], 500);
            }
        }

        // Handle paid course enrollment
        $request->validate([
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id' => 'required|string',
            'razorpay_signature' => 'required|string',
        ]);

        try {
            // Verify payment signature
            $attributes = [
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_signature' => $request->razorpay_signature,
            ];

            $this->razorpay->utility->verifyPaymentSignature($attributes);

            DB::beginTransaction();

            // Find the order
            $order = Order::where('gateway_order_id', $request->razorpay_order_id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            // Get payment details from Razorpay
            $payment = $this->razorpay->payment->fetch($request->razorpay_payment_id);

            // Create payment record
            $paymentRecord = Payment::create([
                'order_id' => $order->id,
                'user_id' => auth()->id(),
                'amount_cents' => $payment->amount,
                'currency' => $payment->currency,
                'gateway' => 'razorpay',
                'gateway_payment_id' => $payment->id,
                'gateway_signature' => $request->razorpay_signature,
                'method' => $payment->method,
                'status' => $payment->status,
                'captured_at' => $payment->captured ? now() : null,
                'raw_payload' => $payment->toArray(),
            ]);

            // Update order status
            $order->update([
                'status' => 'paid',
                'paid_at' => now(),
            ]);

            // Create enrollments for all courses in the order
            foreach ($order->items as $item) {
                // Check if enrollment already exists
                $existingEnrollment = Enrollment::where('user_id', auth()->id())
                    ->where('course_id', $item->course_id)
                    ->where('status', 'active')
                    ->first();

                if (!$existingEnrollment) {
                    Enrollment::create([
                        'user_id' => auth()->id(),
                        'course_id' => $item->course_id,
                        'source' => 'purchase',
                        'status' => 'active',
                        'activated_at' => now(),
                        'payment_id' => $paymentRecord->id,
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Payment successful! You are now enrolled in the course.',
                'redirect_url' => route('enrollments.show', $order->items->first()->course->slug)
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Payment verification failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Payment verification failed. Please contact support.'
            ], 500);
        }
    }

    /**
     * Handle payment failure
     */
    public function paymentFailed(Request $request)
    {
        $request->validate([
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            // Find the order
            $order = Order::where('gateway_order_id', $request->razorpay_order_id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            // Get payment details from Razorpay
            $payment = $this->razorpay->payment->fetch($request->razorpay_payment_id);

            // Create payment record
            Payment::create([
                'order_id' => $order->id,
                'user_id' => auth()->id(),
                'amount_cents' => $payment->amount,
                'currency' => $payment->currency,
                'gateway' => 'razorpay',
                'gateway_payment_id' => $payment->id,
                'method' => $payment->method,
                'status' => $payment->status,
                'error_code' => $payment->error_code ?? null,
                'error_description' => $payment->error_description ?? null,
                'raw_payload' => $payment->toArray(),
            ]);

            // Update order status
            $order->update([
                'status' => 'failed',
                'failed_at' => now(),
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Payment failed. Please try again.',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Payment failure handling failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to process payment failure. Please contact support.'
            ], 500);
        }
    }
}
