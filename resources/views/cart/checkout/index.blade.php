<x-layouts.main>
<div class="bg-gray-50 text-gray-800">

<div class="max-w-7xl mx-auto p-4 md:p-8 grid grid-cols-1 lg:grid-cols-2 gap-8 ">

    <!-- Left Section -->
    <div class="lg:col-span-2 space-y-6  ">

        <!-- Billing Address -->
        <div class="bg-white shadow-md rounded-xl p-6">
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
        <div class="bg-white shadow-md rounded-xl p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-semibold text-lg">Payment method</h2>
                <span class="text-sm text-gray-500 flex items-center gap-1">
            Secure and encrypted
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.105-.895-2-2-2s-2 .895-2 2v2h4v-2zm-2 4h.01M4 7V5a2 2 0 012-2h12a2 2 0 012 2v2m-2 12H6a2 2 0 01-2-2V7h16v12a2 2 0 01-2 2z"/>
            </svg>
          </span>
            </div>

            <!-- UPI -->
            <label class="flex items-center gap-2 mb-4">
                <input type="radio" name="payment" value="upi" x-model="payment" class="form-radio text-purple-600">
                <span class="font-medium">UPI</span>
            </label>
            <div x-show="payment === 'upi'" class="ml-6 border rounded-lg p-4">
                <p class="text-sm font-medium mb-3">How would you like to use UPI?</p>
                <div class="flex gap-2 mb-4">
                    <button @click="upiOption='qr'"
                            :class="upiOption==='qr' ? 'bg-purple-600 text-white' : 'bg-gray-100 text-gray-700'"
                            class="flex-1 py-2 rounded-lg font-medium">QR code</button>
                    <button @click="upiOption='id'"
                            :class="upiOption==='id' ? 'bg-purple-600 text-white' : 'bg-gray-100 text-gray-700'"
                            class="flex-1 py-2 rounded-lg font-medium">UPI ID</button>
                </div>
                <p class="text-sm text-gray-600">Click the "Proceed" button to generate a QR code for UPI payment.</p>
            </div>

            <!-- Cards -->
            <label class="flex items-center gap-2 mt-4">
                <input type="radio" name="payment" value="card" x-model="payment" class="form-radio text-purple-600">
                <span class="font-medium">Cards</span>
                <img src="https://img.icons8.com/color/48/000000/visa.png" class="h-5 ml-2"/>
                <img src="https://img.icons8.com/color/48/000000/mastercard.png" class="h-5"/>
                <img src="https://img.icons8.com/color/48/000000/amex.png" class="h-5"/>
            </label>

            <!-- Net Banking -->
            <label class="flex items-center gap-2 mt-4">
                <input type="radio" name="payment" value="netbanking" x-model="payment" class="form-radio text-purple-600">
                <span class="font-medium">Net Banking</span>
            </label>

            <!-- Mobile Wallets -->
            <label class="flex items-center gap-2 mt-4">
                <input type="radio" name="payment" value="wallet" x-model="payment" class="form-radio text-purple-600">
                <span class="font-medium">Mobile Wallets</span>
            </label>
        </div>

        <!-- Order details -->
        <div class="bg-white shadow-md rounded-xl p-6">
            <h2 class="font-semibold text-lg mb-4">Order details (1 course)</h2>
            <div class="flex justify-between items-center">
                <div class="flex gap-3 items-center">
                    <img src="https://img-c.udemycdn.com/course/240x135/1708340_7108_5.jpg" alt="Course" class="w-20 h-14 rounded object-cover">
                    <p class="text-sm font-medium">The Complete Flutter Development Bootcamp with Dart</p>
                </div>
                <div class="text-right">
                    <p class="font-semibold">₹529</p>
                    <p class="text-gray-400 line-through text-sm">₹4,339</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Right Section (Order Summary) -->
    <div class="bg-white shadow-md rounded-xl p-6 self-start">
        <h2 class="font-semibold text-lg mb-4">Order summary</h2>

        <div class="flex justify-between text-sm mb-2">
            <span>Original Price:</span>
            <span>₹4,339</span>
        </div>

        <div class="flex justify-between text-sm mb-2">
            <span>Discounts (88% Off):</span>
            <span class="text-green-600">-₹3,810</span>
        </div>

        <hr class="my-2">

        <div class="flex justify-between font-semibold text-lg mb-4">
            <span>Total (1 course):</span>
            <span>₹529</span>
        </div>

        <p class="text-xs text-gray-500 mt-3">
            By completing your purchase, you agree to these
            <a href="#" class="text-purple-600 underline">Terms of Use</a>.
        </p>

        <!-- ✅ Proceed Button -->
        <div class="mt-4">
            <button class="w-full bg-gray-800 text-white py-3 rounded-lg font-medium hover:bg-gray-700 hover:text-white transition">
                Proceed
            </button>
        </div>

        <!-- Money Back Guarantee -->
        <div class="mt-6 bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 text-sm">
            <p class="font-medium">30-Day Money-Back Guarantee</p>
            <p class="text-gray-600">Not satisfied? Get a full refund within 30 days. Simple and straightforward!</p>
        </div>

        <!-- Social Proof -->
        <div class="mt-6 bg-orange-50 border border-orange-200 rounded-lg px-3 py-2 text-sm">
            <p class="font-medium text-orange-700">Tap into Success Now</p>
            <p class="text-gray-600">Join 7 people in your country who’ve recently enrolled in this course within the last 24 hours.</p>
        </div>
    </div>

</div>

</div>
</x-layouts.main>
