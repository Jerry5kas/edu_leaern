<!-- layouts/app.blade.php or main layout -->
<x-layouts.main>
<div class="bg-gray-50 text-gray-800">
<div class="max-w-7xl mx-auto px-4 py-6">

    <!-- Header -->
    <h1 class="text-2xl font-bold mb-6">Shopping Cart</h1>

    <!-- Cart Section -->
    <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">

        <!-- Course Info -->
        <div class="flex items-start gap-4">
            <img src="https://img-c.udemycdn.com/course/240x135/1708340_7108_5.jpg" alt="Course Image"
                 class="w-32 h-20 object-cover rounded-md">

            <div>
                <h2 class="font-semibold text-lg">The Complete Flutter Development Bootcamp with Dart</h2>
                <p class="text-sm text-gray-600">By Dr. Angela Yu, Developer and Lead Instructor</p>
                <div class="flex items-center gap-2 mt-1">
                    <span class="text-yellow-500 font-bold">4.5</span>
                    <div class="flex">
                        <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049.927c.3-.921 1.603-.921 1.902 0l1.286 3.974a1 1 0 00.95.69h4.182c.969 0 1.371 1.24.588 1.81l-3.39 2.462a1 1 0 00-.364 1.118l1.287 3.974c.3.922-.755 1.688-1.54 1.118L10 13.347l-3.95 2.726c-.785.57-1.84-.196-1.54-1.118l1.287-3.974a1 1 0 00-.364-1.118L2.043 7.4c-.783-.57-.38-1.81.588-1.81h4.182a1 1 0 00.95-.69L9.049.927z"/></svg>
                    </div>
                    <span class="text-sm text-gray-600">(57,380 ratings)</span>
                </div>
                <p class="text-sm text-gray-600 mt-1">29 total hours · 217 lectures · All Levels</p>
                <span class="mt-2 inline-block text-xs bg-purple-100 text-gray-700 px-2 py-1 rounded">Premium</span>
            </div>
        </div>

        <!-- Pricing & Actions -->
        <div class="flex flex-col items-end gap-2">
            <div class="flex gap-4 text-sm">
                <a href="#" class="text-gray-600 hover:underline">Remove</a>
                <a href="#" class="text-gray-600 hover:underline">Save for Later</a>
                <a href="#" class="text-gray-600 hover:underline">Move to Wishlist</a>
            </div>
            <div class="text-lg font-bold">₹529 <span class="line-through text-gray-400 text-sm">₹4,339</span></div>
            <p class="text-green-600 text-sm">88% off</p>
        </div>
    </div>

    <!-- Checkout -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mt-6 bg-white rounded-2xl shadow-md p-6">
        <div class="text-xl font-semibold">Total: ₹529 <span class="line-through text-gray-400 text-base">₹4,339</span></div>
        <div class="flex flex-col gap-3 w-full md:w-auto mt-4 md:mt-0">
            <a href="/checkout">
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

        <!-- Repeat course cards... -->
    </div>
</div>
</div>

</x-layouts.main>
