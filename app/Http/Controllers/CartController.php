<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Add course to cart
     */
    public function add(Request $request)
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

            // Get or create pending order for user
            $order = Order::where('user_id', auth()->id())
                ->where('status', 'pending')
                ->first();

            if (!$order) {
                $order = Order::create([
                    'user_id' => auth()->id(),
                    'currency' => $course->currency,
                    'amount_cents' => 0,
                    'discount_cents' => 0,
                    'tax_cents' => 0,
                    'total_cents' => 0,
                    'status' => 'pending',
                    'gateway' => 'razorpay',
                    'gateway_order_id' => '',
                    'placed_at' => now(),
                ]);
            }

            // Check if course is already in cart
            $existingItem = OrderItem::where('order_id', $order->id)
                ->where('course_id', $course->id)
                ->first();

            if ($existingItem) {
                return response()->json([
                    'success' => false,
                    'message' => 'Course is already in your cart',
                    'cart_count' => $order->items()->count()
                ]);
            }

            // Add course to cart
            OrderItem::create([
                'order_id' => $order->id,
                'course_id' => $course->id,
                'unit_price_cents' => $course->price_cents,
                'quantity' => 1, // Always 1 for courses
                'line_total_cents' => $course->price_cents,
            ]);

            // Update order totals
            $totalAmount = $order->items()->sum('line_total_cents');
            $order->update([
                'amount_cents' => $totalAmount,
                'total_cents' => $totalAmount,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Course added to cart successfully!',
                'cart_count' => $order->items()->count()
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Cart add error: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'course_id' => $request->course_id,
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Failed to add course to cart. Please try again.',
                'debug' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Show cart page
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
            return view('cart.index', ['order' => null, 'items' => collect()]);
        }

        return view('cart.index', [
            'order' => $order,
            'items' => $order->items
        ]);
    }

    /**
     * Remove item from cart
     */
    public function remove(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:order_items,id',
        ]);

        try {
            DB::beginTransaction();

            $item = OrderItem::where('id', $request->item_id)
                ->whereHas('order', function ($query) {
                    $query->where('user_id', auth()->id());
                })
                ->firstOrFail();

            $order = $item->order;
            $item->delete();

            // Update order totals
            $totalAmount = $order->items()->sum('line_total_cents');
            $order->update([
                'amount_cents' => $totalAmount,
                'total_cents' => $totalAmount,
            ]);

            // If no items left, delete the order
            if ($order->items->count() == 0) {
                $order->delete();
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Item removed from cart',
                'cart_count' => $order->items->count(),
                'total_amount' => number_format($totalAmount / 100, 2),
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to remove item from cart'
            ], 500);
        }
    }

    /**
     * Get cart count for header
     */
    public function getCartCount()
    {
        $count = Order::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->withCount('items')
            ->first();

        return response()->json([
            'count' => $count ? $count->items_count : 0
        ]);
    }
}
