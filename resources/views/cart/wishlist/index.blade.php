<x-layouts.main>
<div class="bg-white text-gray-900">

<!-- Navbar -->
<header class="bg-gray-900 text-white ">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-4">
        <!-- Logo -->
        <h1 class="text-2xl font-bold">My learning</h1>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex space-x-6 text-sm font-medium">
            <a href="#" class="hover:text-gray-300">All courses</a>
            <a href="{{ route('enrollments.index') }}" class="text-white hover:text-gray-300 font-medium">My Courses</a>
            <a href="#" class="border-b-2 border-white pb-1">Wishlist</a>
            <a href="#" class="hover:text-gray-300">Certifications</a>
            <a href="#" class="hover:text-gray-300">Archived</a>
            <a href="#" class="hover:text-gray-300">Learning tools</a>
        </nav>

        <!-- Mobile Hamburger -->
        <button class="md:hidden focus:outline-none" @click="mobileMenu = !mobileMenu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenu" class="md:hidden px-4 pb-4 space-y-2">
        <a href="#" class="block hover:text-gray-300">All courses</a>
        <a href="/my-courses" class="block hover:text-gray-300">My Lists</a>
        <a href="#" class="block border-b-2 border-white">Wishlist</a>
        <a href="#" class="block hover:text-gray-300">Certifications</a>
        <a href="#" class="block hover:text-gray-300">Archived</a>
        <a href="#" class="block hover:text-gray-300">Learning tools</a>
    </div>
</header>

<!-- Content -->
<main class="max-w-7xl mx-auto px-4 py-6">
    <!-- Search -->
    <div class="flex justify-end mb-6">
        <div class="flex items-center w-full md:w-1/3">
            <input type="text" placeholder="Search my courses"
                   class="w-full border rounded-l-lg px-3 py-2 text-sm focus:ring-2 focus:ring-purple-500 focus:outline-none">
            <button class="bg-purple-600 text-white px-3 py-2 rounded-r-lg hover:bg-purple-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Wishlist Card -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="border rounded-lg shadow hover:shadow-lg transition bg-white">
            <img src="https://img-c.udemycdn.com/course/240x135/567828_67d0.jpg"
                 alt="Python Course" class="rounded-t-lg w-full">
            <div class="p-4">
                <h3 class="font-semibold text-sm mb-1">
                    The Complete Python Bootcamp From Zero to Hero in Python
                </h3>
                <p class="text-xs text-gray-500">Jose Portilla, Pierian Training</p>
                <div class="flex items-center mt-1 space-x-1 text-xs">
                    <span class="font-semibold text-yellow-500">4.6</span>
                    <span class="text-yellow-500">★★★★★</span>
                    <span class="text-gray-500">(545,158)</span>
                </div>
                <p class="text-xs text-gray-600 mt-1">22.5 total hours · 170 lectures</p>
                <div class="mt-2 flex items-center space-x-2">
                    <span class="font-bold text-lg">₹399</span>
                    <span class="line-through text-gray-500 text-sm">₹3,499</span>
                </div>

                <!-- ✅ Checkout & Remove Buttons -->
                <div class="mt-4 flex space-x-2">
                    <!-- Checkout Button -->
                    <a href="/checkout"
                       class="flex-1 text-center bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-700 transition">
                        Go to Checkout
                    </a>

                    <button class="flex items-center justify-center px-3 py-2 bg-red-600 text-white rounded-lg hover:bg-red-500 transition">
                        <!-- Trash Heroicon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M6 7.5h12m-9 3v6m6-6v6M9.75 4.5h4.5c.414 0
                     .75.336.75.75V6h3.75M9.75 4.5A.75.75 0 0 0
                     9 5.25V6H5.25m4.5-1.5h4.5m-9 1.5V18A2.25
                     2.25 0 0 0 7.5 20.25h9A2.25 2.25 0 0 0
                     18.75 18V6H5.25z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
</main>
</div>
</x-layouts.main>

