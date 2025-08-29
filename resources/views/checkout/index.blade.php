<x-layouts.main>
    <div class="bg-gray-50 text-gray-800">
        <div class="max-w-7xl mx-auto p-4 sm:p-6 md:p-8 grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Section -->
            <div class="lg:col-span-1 space-y-6 w-full">
                <!-- Order Details -->
                <div class="bg-white shadow-md rounded-xl p-6 w-full">
                    <h2 class="font-semibold text-lg mb-4">Order details ({{ $order->items->count() }} course{{ $order->items->count() > 1 ? 's' : '' }})</h2>
                    @foreach($order->items as $item)
                        <div class="flex justify-between items-center {{ !$loop->last ? 'mb-4' : '' }}">
                            <div class="flex gap-3 items-center min-w-0">
                                <div class="w-20 h-14 bg-gray-200 rounded overflow-hidden flex-shrink-0">
                                    @if($item->course->thumbnail_path)
                                        <img src="{{ asset('storage/' . $item->course->thumbnail_path) }}"
                                             alt="{{ $item->course->title }}"
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 0112 15a4 4 0 016.879 2.804M15 11a3 3 0 10-6 0 3 3 0 006 0z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <p class="text-sm font-medium truncate">{{ $item->course->title }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold">
                                    @if($order->currency === 'INR')
                                        ₹{{ number_format($item->unit_price_cents / 100, 2) }}
                                    @else
                                        €{{ number_format($item->unit_price_cents / 100, 2) }}
                                    @endif
                                </p>
                                <p class="text-gray-400 line-through text-sm">
                                    @if($order->currency === 'INR')
                                        ₹{{ number_format(($item->unit_price_cents * 8) / 100, 2) }}
                                    @else
                                        €{{ number_format(($item->unit_price_cents * 8) / 100, 2) }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Billing Address -->
                <div class="bg-white shadow-md rounded-xl p-6 w-full">
                    <h2 class="font-semibold text-lg mb-4">Billing address</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                            <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500">
                                <option>India</option>
                                <option>USA</option>
                                <option>UK</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">State / Union Territory</label>
                            <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500">
                                <option>Andhra Pradesh</option>
                                <option>Telangana</option>
                                <option>Karnataka</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div x-data="{ payment: '', upiOption: '' }" class="bg-white shadow-md rounded-xl p-6 w-full">
                    <!-- Header -->
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="font-semibold text-lg">Payment Method</h2>
                        <span class="text-sm text-gray-500 flex items-center gap-1">
                            Secure and encrypted
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.105-.895-2-2-2s-2 .895-2 2v2h4v-2zm-2 4h.01M4 7V5a2 2 0 012-2h12a2 2 0 012 2v2m-2 12H6a2 2 0 01-2-2V7h16v12a2 2 0 01-2 2z"/>
                            </svg>
                        </span>
                    </div>

                    <!-- Payment Options -->
                    <div class="space-y-4">
                        <!-- UPI -->
                        <div>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="payment" value="upi" x-model="payment" class="form-radio text-purple-600">
                                <span class="font-medium">UPI</span>
                            </label>
                            <div x-show="payment === 'upi'" x-transition class="ml-6 border rounded-lg p-4 mt-2 space-y-3">
                                <p class="text-sm font-medium">How would you like to use UPI?</p>
                                <div class="flex gap-2 flex-wrap">
                                    <button @click="upiOption='qr'"
                                            :class="upiOption==='qr' ? 'bg-purple-600 text-white' : 'bg-gray-100 text-gray-700'"
                                            class="flex-1 min-w-[100px] py-2 rounded-lg font-medium transition-all">QR code</button>
                                    <button @click="upiOption='id'"
                                            :class="upiOption==='id' ? 'bg-purple-600 text-white' : 'bg-gray-100 text-gray-700'"
                                            class="flex-1 min-w-[100px] py-2 rounded-lg font-medium transition-all">UPI ID</button>
                                </div>
                                <p class="text-sm text-gray-600">Click "Proceed" to generate QR code for UPI payment.</p>
                            </div>
                        </div>

                        <!-- Cards -->
                        <div>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="payment" value="card" x-model="payment" class="form-radio text-purple-600">
                                <span class="font-medium">Cards</span>
                                <div class="flex gap-2 ml-2">
                                    <img src="https://img.icons8.com/color/48/000000/visa.png" class="h-5"/>
                                    <img src="https://img.icons8.com/color/48/000000/mastercard.png" class="h-5"/>
                                    <img src="https://img.icons8.com/color/48/000000/amex.png" class="h-5"/>
                                </div>
                            </label>
                        </div>

                        <!-- Net Banking -->
                        <div>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="payment" value="netbanking" x-model="payment" class="form-radio text-purple-600">
                                <span class="font-medium">Net Banking</span>
                            </label>
                        </div>

                        <!-- Mobile Wallets -->
                        <div>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="payment" value="wallet" x-model="payment" class="form-radio text-purple-600">
                                <span class="font-medium">Mobile Wallets</span>
                            </label>
                        </div>

                        <!-- Razorpay -->
                        <div>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="payment" value="razorpay" x-model="payment" class="form-radio text-purple-600">
                                <span class="font-medium">Razorpay</span>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Razorpay_logo.svg" class="h-5 ml-2"/>
                            </label>
                            <div x-show="payment === 'razorpay'" x-transition class="ml-6 border rounded-lg p-4 mt-2 space-y-3">
                                <p class="text-sm text-gray-600">You will be redirected to Razorpay secure gateway to complete your payment.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Proceed Button -->
                    <div class="mt-6">
                        <button :disabled="!payment"
                                @click="initiatePayment()"
                                class="w-full py-2 px-4 rounded-lg bg-purple-600 text-white font-medium hover:bg-purple-700 disabled:bg-gray-300 disabled:cursor-not-allowed transition-all">
                            Proceed
                        </button>
                    </div>
                </div>

            <!-- Right Section (Order Summary) -->
            <div class="bg-white shadow-md rounded-xl p-6 w-full self-start space-y-4">
                <h2 class="font-semibold text-lg mb-2">Order summary</h2>

                <div class="flex justify-between text-sm">
                    <span>Original Price:</span>
                    <span>
                        @if($order->currency === 'INR')
                            ₹{{ number_format(($order->total_cents * 8) / 100, 2) }}
                        @else
                            €{{ number_format(($order->total_cents * 8) / 100, 2) }}
                        @endif
                    </span>
                </div>

                <div class="flex justify-between text-sm">
                    <span>Discounts (88% Off):</span>
                    <span class="text-green-600">
                        -@if($order->currency === 'INR')
                            ₹{{ number_format(($order->total_cents * 7) / 100, 2) }}
                        @else
                            €{{ number_format(($order->total_cents * 7) / 100, 2) }}
                        @endif
                    </span>
                </div>

                <hr class="my-2">

                <div class="flex justify-between font-semibold text-lg">
                    <span>Total ({{ $order->items->count() }} course{{ $order->items->count() > 1 ? 's' : '' }}):</span>
                    <span>
                        @if($order->currency === 'INR')
                            ₹{{ number_format($order->total_cents / 100, 2) }}
                        @else
                            €{{ number_format($order->total_cents / 100, 2) }}
                        @endif
                    </span>
                </div>

                <p class="text-xs text-gray-500 mt-2">
                    By completing your purchase, you agree to these
                    <a href="#" class="text-purple-600 underline">Terms of Use</a>.
                </p>

                <!-- Proceed Button -->
                <div>
                    <button onclick="initiatePayment()"
                            class="w-full bg-gray-800 text-white py-3 rounded-lg font-medium hover:bg-gray-700 transition-all">
                        Proceed
                    </button>
                </div>

                <!-- Money Back Guarantee -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 text-sm">
                    <p class="font-medium">30-Day Money-Back Guarantee</p>
                    <p class="text-gray-600">Not satisfied? Get a full refund within 30 days. Simple and straightforward!</p>
                </div>

                <!-- Social Proof -->
                <div class="bg-orange-50 border border-orange-200 rounded-lg px-3 py-2 text-sm">
                    <p class="font-medium text-orange-700">Tap into Success Now</p>
                    <p class="text-gray-600">Join 7 people in your country who've recently enrolled in this course within the last 24 hours.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Razorpay Integration -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        function initiatePayment() {
            const payButton = document.querySelector('button[onclick="initiatePayment()"]');

            // Disable button to prevent double clicks
            payButton.disabled = true;
            payButton.textContent = 'Processing...';

            // Create order
            fetch('{{ route('checkout.create-order') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Initialize Razorpay
                    const options = {
                        key: data.key,
                        amount: data.amount,
                        currency: data.currency,
                        name: 'EduLearn',
                        description: 'Course Purchase',
                        order_id: data.razorpay_order_id,
                        handler: function (response) {
                            // Handle successful payment
                            fetch('{{ route('checkout.success') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    razorpay_payment_id: response.razorpay_payment_id,
                                    razorpay_order_id: response.razorpay_order_id,
                                    razorpay_signature: response.razorpay_signature
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Show success message
                                    const message = document.createElement('div');
                                    message.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                                    message.textContent = data.message;
                                    document.body.appendChild(message);

                                    // Remove message after 3 seconds and redirect
                                    setTimeout(() => {
                                        if (message.parentNode) {
                                            message.parentNode.removeChild(message);
                                        }
                                        window.location.href = data.redirect_url;
                                    }, 3000);
                                } else {
                                    alert('Payment verification failed: ' + data.message);
                                    location.reload();
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('An error occurred. Please try again.');
                                location.reload();
                            });
                        },
                        prefill: {
                            name: '{{ auth()->user()->name }}',
                            email: '{{ auth()->user()->email }}'
                        },
                        theme: {
                            color: '#7C3AED'
                        }
                    };

                    const rzp = new Razorpay(options);
                    rzp.open();

                    rzp.on('payment.failed', function (response) {
                        // Handle payment failure
                        fetch('{{ route('checkout.failure') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                razorpay_payment_id: response.error.metadata.payment_id,
                                razorpay_order_id: response.error.metadata.order_id
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            alert('Payment failed: ' + response.error.description);
                            location.reload();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Payment failed. Please try again.');
                            location.reload();
                        });
                    });
                } else {
                    alert(data.message);
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
                location.reload();
            })
            .finally(() => {
                // Re-enable button
                payButton.disabled = false;
                payButton.textContent = 'Proceed';
            });
        }
    </script>
</x-layouts.main>
