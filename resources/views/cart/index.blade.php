<!-- layouts/app.blade.php or main layout -->
<x-layouts.main>
    <div class="bg-gray-50 text-gray-800">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <!-- Header -->
            <h1 class="text-2xl font-bold mb-6">Shopping Cart</h1>

            @if($order && $items->count() > 0)
                <!-- Cart Items -->
                @foreach($items as $item)
                    <!-- Cart Section -->
                    <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 mb-4">
                        <!-- Course Info -->
                        <div class="flex items-start gap-4">
                            <div class="w-32 h-20 bg-gray-200 rounded-md overflow-hidden">
                                @if($item->course->thumbnail_path)
                                    <img src="{{ asset('storage/' . $item->course->thumbnail_path) }}" 
                                         alt="{{ $item->course->title }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 0112 15a4 4 0 016.879 2.804M15 11a3 3 0 10-6 0 3 3 0 006 0z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <div>
                                <h2 class="font-semibold text-lg">{{ $item->course->title }}</h2>
                                <p class="text-sm text-gray-600">By {{ $item->course->creator ? $item->course->creator->name : 'Unknown Instructor' }}</p>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-yellow-500 font-bold">4.5</span>
                                    <div class="flex">
                                        <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049.927c.3-.921 1.603-.921 1.902 0l1.286 3.974a1 1 0 00.95.69h4.182c.969 0 1.371 1.24.588 1.81l-3.39 2.462a1 1 0 00-.364 1.118l1.287 3.974c.3.922-.755 1.688-1.54 1.118L10 13.347l-3.95 2.726c-.785.57-1.84-.196-1.54-1.118l1.287-3.974a1 1 0 00-.364-1.118L2.043 7.4c-.783-.57-.38-1.81.588-1.81h4.182a1 1 0 00.95-.69L9.049.927z"/>
                                        </svg>
                                    </div>
                                    <span class="text-sm text-gray-600">(57,380 ratings)</span>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">29 total hours · 217 lectures · {{ ucfirst($item->course->level) }}</p>
                                <span class="mt-2 inline-block text-xs bg-purple-100 text-gray-700 px-2 py-1 rounded">Premium</span>
                            </div>
                        </div>

                        <!-- Pricing & Actions -->
                        <div class="flex flex-col items-end gap-2">
                            <div class="flex gap-4 text-sm">
                                <button onclick="removeFromCart({{ $item->id }})" class="text-gray-600 hover:underline">Remove</button>
                                <a href="#" class="text-gray-600 hover:underline">Save for Later</a>
                                <a href="#" class="text-gray-600 hover:underline">Move to Wishlist</a>
                            </div>
                            <div class="text-lg font-bold">
                                @if($item->course->currency === 'INR')
                                    ₹{{ number_format($item->unit_price_cents / 100, 2) }}
                                @else
                                    €{{ number_format($item->unit_price_cents / 100, 2) }}
                                @endif
                                <span class="line-through text-gray-400 text-sm">
                                    @if($item->course->currency === 'INR')
                                        ₹{{ number_format(($item->unit_price_cents * 8) / 100, 2) }}
                                    @else
                                        €{{ number_format(($item->unit_price_cents * 8) / 100, 2) }}
                                    @endif
                                </span>
                            </div>
                            <p class="text-green-600 text-sm">88% off</p>
                        </div>
                    </div>
                @endforeach

                <!-- Checkout -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mt-6 bg-white rounded-2xl shadow-md p-6">
                    <div class="text-xl font-semibold">
                        Total: 
                        @if($order->currency === 'INR')
                            ₹{{ number_format($order->total_cents / 100, 2) }}
                        @else
                            €{{ number_format($order->total_cents / 100, 2) }}
                        @endif
                        <span class="line-through text-gray-400 text-base">
                            @if($order->currency === 'INR')
                                ₹{{ number_format(($order->total_cents * 8) / 100, 2) }}
                            @else
                                €{{ number_format(($order->total_cents * 8) / 100, 2) }}
                            @endif
                        </span>
                    </div>
                    <div class="flex flex-col gap-3 w-full md:w-auto mt-4 md:mt-0">
                        <a href="{{ route('checkout.index') }}">
                            <button class="border border-gray-600 text-gray-600 px-6 py-2 rounded-xl hover:bg-gray-700 hover:text-white transition w-full md:w-auto">
                                Proceed to Checkout
                            </button>
                        </a>

                        <button class="border border-gray-600 text-gray-600 px-6 py-2 rounded-xl hover:bg-gray-700 hover:text-white transition w-full md:w-auto">
                            Apply Coupon
                        </button>
                    </div>
                </div>

                <!-- Recommendations -->
                <h2 class="text-xl font-bold mt-10 mb-4">You might also like</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                    <!-- Course Card -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="https://img-c.udemycdn.com/course/240x135/123456.jpg" class="w-full h-32 object-cover" alt="Course">
                        <div class="p-4">
                            <h3 class="font-semibold text-sm">Complete Flutter Guide 2025: Build Android, iOS and Web</h3>
                            <p class="text-xs text-gray-500 mt-1">Sagnik Bhattacharya, Paulina Knop</p>
                            <div class="flex items-center gap-1 mt-2 text-yellow-500 text-xs">
                                ★★★★☆ <span class="text-gray-600 ml-1">(6,830)</span>
                            </div>
                            <div class="flex justify-between items-center mt-3">
                                <span class="font-bold">₹529</span>
                                <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded">Highest Rated</span>
                            </div>
                        </div>
                    </div>

                    <!-- Course Card -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="https://img-c.udemycdn.com/course/240x135/123456.jpg" class="w-full h-32 object-cover" alt="Course">
                        <div class="p-4">
                            <h3 class="font-semibold text-sm">Complete Flutter Guide 2025: Build Android, iOS and Web</h3>
                            <p class="text-xs text-gray-500 mt-1">Sagnik Bhattacharya, Paulina Knop</p>
                            <div class="flex items-center gap-1 mt-2 text-yellow-500 text-xs">
                                ★★★★☆ <span class="text-gray-600 ml-1">(6,830)</span>
                            </div>
                            <div class="flex justify-between items-center mt-3">
                                <span class="font-bold">₹529</span>
                                <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded">Highest Rated</span>
                            </div>
                        </div>
                    </div>

                    <!-- Course Card -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="https://img-c.udemycdn.com/course/240x135/123456.jpg" class="w-full h-32 object-cover" alt="Course">
                        <div class="p-4">
                            <h3 class="font-semibold text-sm">Complete Flutter Guide 2025: Build Android, iOS and Web</h3>
                            <p class="text-xs text-gray-500 mt-1">Sagnik Bhattacharya, Paulina Knop</p>
                            <div class="flex items-center gap-1 mt-2 text-yellow-500 text-xs">
                                ★★★★☆ <span class="text-gray-600 ml-1">(6,830)</span>
                            </div>
                            <div class="flex justify-between items-center mt-3">
                                <span class="font-bold">₹529</span>
                                <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded">Highest Rated</span>
                            </div>
                        </div>
                    </div>

                    <!-- Course Card -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="https://img-c.udemycdn.com/course/240x135/123456.jpg" class="w-full h-32 object-cover" alt="Course">
                        <div class="p-4">
                            <h3 class="font-semibold text-sm">Complete Flutter Guide 2025: Build Android, iOS and Web</h3>
                            <p class="text-xs text-gray-500 mt-1">Sagnik Bhattacharya, Paulina Knop</p>
                            <div class="flex items-center gap-1 mt-2 text-yellow-500 text-xs">
                                ★★★★☆ <span class="text-gray-600 ml-1">(6,830)</span>
                            </div>
                            <div class="flex justify-between items-center mt-3">
                                <span class="font-bold">₹529</span>
                                <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded">Highest Rated</span>
                            </div>
                        </div>
                    </div>

                    <!-- Course Card -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="https://img-c.udemycdn.com/course/240x135/123456.jpg" class="w-full h-32 object-cover" alt="Course">
                        <div class="p-4">
                            <h3 class="font-semibold text-sm">Complete Flutter Guide 2025: Build Android, iOS and Web</h3>
                            <p class="text-xs text-gray-500 mt-1">Sagnik Bhattacharya, Paulina Knop</p>
                            <div class="flex items-center gap-1 mt-2 text-yellow-500 text-xs">
                                ★★★★☆ <span class="text-gray-600 ml-1">(6,830)</span>
                            </div>
                            <div class="flex justify-between items-center mt-3">
                                <span class="font-bold">₹529</span>
                                <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded">Highest Rated</span>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Empty Cart -->
                <div class="text-center py-12">
                    <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"/>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Your cart is empty</h3>
                    <p class="text-gray-600 mb-6">Start adding courses to your cart to begin learning.</p>
                    <a href="{{ route('courses.index') }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        Browse Courses
                    </a>
                </div>
            @endif
        </div>
    </div>

    <script>
        function removeFromCart(itemId) {
            if (!confirm('Are you sure you want to remove this course from your cart?')) {
                return;
            }

            fetch('{{ route('cart.remove') }}', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    item_id: itemId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update cart count in header
                    const cartCount = document.getElementById('cart-count');
                    if (cartCount && data.cart_count !== undefined) {
                        cartCount.textContent = data.cart_count;
                        if (data.cart_count > 0) {
                            cartCount.style.display = 'flex';
                        } else {
                            cartCount.style.display = 'none';
                        }
                    }
                    location.reload();
                } else {
                    alert('Failed to remove item from cart');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        }
    </script>
</x-layouts.main>
