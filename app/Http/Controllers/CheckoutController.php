<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;

class CheckoutController extends Controller
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
     * Show checkout page
     */
    public function index()
    {
        $order = Order::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->with(['items.course' => function ($query) {
                $query->with(['categories', 'creator']);
            }])
            ->first();

        if (!$order || $order->items->count() == 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        return view('checkout.index', compact('order'));
    }

    /**
     * Create Razorpay order and initiate payment
     */
    public function createOrder(Request $request)
    {
        $order = Order::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->with('items.course')
            ->first();

        if (!$order || $order->items->count() == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No items in cart'
            ]);
        }

        try {
            DB::beginTransaction();

            // Update order status to pending
            $order->update([
                'status' => 'pending',
                'placed_at' => now(),
            ]);

            // Create Razorpay order
            $razorpayOrder = $this->razorpay->order->create([
                'amount' => $order->total_cents,
                'currency' => $order->currency,
                'receipt' => 'order_' . $order->id,
                'notes' => [
                    'order_id' => $order->id,
                    'user_id' => auth()->id(),
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
                'amount' => $order->total_cents,
                'currency' => $order->currency,
                'key' => config('services.razorpay.key'),
                'order' => [
                    'id' => $order->id,
                    'total' => number_format($order->total_cents / 100, 2),
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Checkout order creation failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to create order. Please try again.'
            ], 500);
        }
    }

    /**
     * Handle successful payment
     */
    public function success(Request $request)
    {
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
                'message' => 'Payment successful! You are now enrolled in the courses.',
                'redirect_url' => route('enrollments.index')
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
    public function failure(Request $request)
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
                'redirect_url' => route('checkout.index')
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
