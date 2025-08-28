<?php


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Public routes
Route::get('/', [HomeController::class, 'showForm'])->name('home');

// Authentication routes
Route::middleware('guest')->group(function () {
    // Traditional auth routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

    // Google OAuth routes
    Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::post('/profile/image', [ProfileController::class, 'updateProfileImage'])->name('profile.image');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Redirect old route to new route
    Route::get('/auth/profile', function () {
        return redirect()->route('profile');
    })->name('auth.profile');

    // Course routes
    Route::get('/courses', [App\Http\Controllers\Course\CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{slug}', [App\Http\Controllers\Course\CourseController::class, 'show'])->name('courses.show');

    // Enrollment routes
    Route::get('/my-courses', [\App\Http\Controllers\Course\EnrollmentController::class, 'index'])->name('enrollments.index');
    Route::get('/my-courses/{courseSlug}', [\App\Http\Controllers\Course\EnrollmentController::class, 'show'])->name('enrollments.show');
    Route::post('/enrollments/create-order', [\App\Http\Controllers\Course\EnrollmentController::class, 'createOrder'])->name('enrollments.create-order');
    Route::post('/enrollments/store', [\App\Http\Controllers\Course\EnrollmentController::class, 'store'])->name('enrollments.store');
    Route::post('/enrollments/payment-failed', [\App\Http\Controllers\Course\EnrollmentController::class, 'paymentFailed'])->name('enrollments.payment-failed');

    // Cart routes
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/count', [App\Http\Controllers\CartController::class, 'getCartCount'])->name('cart.count');

    // Checkout routes
    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/create-order', [App\Http\Controllers\CheckoutController::class, 'createOrder'])->name('checkout.create-order');
    Route::post('/checkout/success', [App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');
    Route::post('/checkout/failure', [App\Http\Controllers\CheckoutController::class, 'failure'])->name('checkout.failure');

    // Test route for debugging cart
    Route::get('/test-cart', function() {
        $user = auth()->user();
        $order = \App\Models\Order::where('user_id', $user->id)
            ->where('status', 'pending')
            ->with('items.course')
            ->first();
        
        return response()->json([
            'user_id' => $user->id,
            'order' => $order ? [
                'id' => $order->id,
                'status' => $order->status,
                'items_count' => $order->items->count(),
                'items' => $order->items->map(function($item) {
                    return [
                        'id' => $item->id,
                        'course_id' => $item->course_id,
                        'course_title' => $item->course->title,
                        'quantity' => $item->quantity,
                        'unit_price' => $item->unit_price_cents,
                        'line_total' => $item->line_total_cents
                    ];
                })
            ] : null
        ]);
    })->name('test.cart');
});

