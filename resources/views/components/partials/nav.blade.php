<!-- Alpine Store for Modal -->
<div x-data @keydown.escape.window="$store.modal.showLogin = false">
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('modal', {
                showLogin: false
            });
        });
    </script>

    <!-- Overlay -->
    <div
        x-show="$store.modal.showLogin"
        x-transition.opacity
        @click="$store.modal.showLogin = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-40"
        style="display: none"
    ></div>

    <!-- Slide-in Modal -->
    <div
        x-show="$store.modal.showLogin"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed right-0 top-0 h-full w-full sm:w-3/4 lg:w-1/2 bg-white z-50 shadow-lg overflow-y-auto"
        @click.outside="$store.modal.showLogin = false"
        style="display: none"
    >
        <!-- Close Button -->
        <div class="flex justify-end p-4">
            <button @click="$store.modal.showLogin = false" class="text-gray-500 hover:text-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Modal Content -->
        <div class="px-6 sm:px-8 pb-10">
            <h2 class="text-2xl sm:text-3xl font-bold mb-2">Login</h2>
            <p class="text-sm mb-6">
                or <a href="#" class="text-green-600 font-medium underline">create your account</a>
            </p>

            <!-- Mobile Number Input -->
            <div class="flex items-center border border-gray-300 rounded px-3 py-2 mb-4">
                <img src="https://flagcdn.com/in.svg" alt="India" class="w-5 h-5 mr-2">
                <span class="text-gray-600 text-sm mr-2">+91</span>
                <input type="tel" placeholder="Enter your mobile number"
                       class="flex-1 text-sm focus:outline-none text-gray-700">
            </div>

            <button class="w-full bg-gray-200 text-gray-700 py-2 rounded font-medium mb-4">
                Login
            </button>

            <div class="text-center">
                <a href="#" class="text-sm font-semibold underline text-gray-800">Continue with email</a>
            </div>

            <p class="text-xs text-gray-500 mt-6 text-center">
                Having trouble? visit our <a href="#" class="text-blue-600 underline">Help center</a>
            </p>
        </div>
    </div>
</div>

<!-- NAVBAR -->
<nav x-data="{ open: false }" class="bg-slate-800 text-white w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 text-xl sm:text-2xl font-bold">
                Logo
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-6 lg:space-x-8 text-sm sm:text-base">
                <a href="#" class="hover:text-slate-300 transition">Home</a>
                <a href="#" class="hover:text-slate-300 transition">Courses</a>
                <a href="#" class="hover:text-slate-300 transition">About</a>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden md:flex space-x-4 text-sm sm:text-base">
                <a href="javascript:void(0)" @click="$store.modal.showLogin = true" class="hover:text-slate-300 transition">
                    Log in
                </a>
                <a href="#" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700 transition">
                    Join for Free
                </a>
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
    <div x-show="open" x-transition class="md:hidden bg-slate-700 px-4 pb-4 space-y-2">
        <a href="#" class="block py-2 border-b border-slate-600">Home</a>
        <a href="#" class="block py-2 border-b border-slate-600">Courses</a>
        <a href="#" class="block py-2 border-b border-slate-600">About</a>

        <div class="pt-2 border-t border-slate-600">
            <a href="javascript:void(0)" @click="$store.modal.showLogin = true" class="block py-2 text-white">
                Log in
            </a>
            <a href="#" class="block py-2 bg-blue-600 text-center rounded mt-2 hover:bg-blue-700 transition">
                Join for Free
            </a>
        </div>
    </div>
</nav>
