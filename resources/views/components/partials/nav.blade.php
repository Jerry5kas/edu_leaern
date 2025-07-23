<nav x-data="{ open: false }" class="bg-slate-800 text-white w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 text-2xl font-bold">
                Logo
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8">
                <a href="#" class="hover:text-slate-300 transition">Home</a>
                <a href="#" class="hover:text-slate-300 transition">Courses</a>
                <a href="#" class="hover:text-slate-300 transition">About</a>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden md:flex space-x-4">
                <a href="#" class="hover:text-slate-300 transition">Log in</a>
                <a href="#" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700 transition">Join for Free</a>
            </div>

            <!-- Mobile Hamburger -->
            <div class="md:hidden">
                <button @click="open = !open" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition class="md:hidden bg-slate-700 px-4 pb-4">
        <a href="#" class="block py-2 border-b border-slate-600">Home</a>
        <a href="#" class="block py-2 border-b border-slate-600">Courses</a>
        <a href="#" class="block py-2 border-b border-slate-600">About</a>
        <div class="mt-2">
            <a href="#" class="block py-2 border-b border-slate-600">Log in</a>
            <a href="#" class="block py-2 bg-blue-600 text-center rounded mt-2 hover:bg-blue-700 transition">Join for Free</a>
        </div>
    </div>
</nav>
