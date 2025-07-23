
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('modal', {
            showAuth: false,
            authTab: 'login'
        });
    });
</script>
<!-- Modal -->
<div x-data @keydown.escape.window="$store.modal.showAuth = false">
    <!-- Overlay -->
    <div
        x-show="$store.modal.showAuth"
        x-transition.opacity
        @click="$store.modal.showAuth = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-40"
        style="display: none"
    ></div>

    <!-- Slide-in Modal -->
    <div
        x-show="$store.modal.showAuth"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed right-0 top-0 h-full w-full sm:w-3/4 lg:w-1/2 bg-white z-50 shadow-lg overflow-y-auto"
        @click.outside="$store.modal.showAuth = false"
        style="display: none"
    >
        <!-- Close Button -->
        <div class="flex justify-end p-4">
            <button @click="$store.modal.showAuth = false" class="text-gray-500 hover:text-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Modal Content -->
        <div class="px-6 sm:px-8 pb-10">
            <h2 class="text-2xl sm:text-3xl font-bold mb-2"
                x-text="$store.modal.authTab === 'login' ? 'Login' : 'Join for Free'">
            </h2>

            <p class="text-sm mb-6">
                <template x-if="$store.modal.authTab === 'login'">
                    <span>or <a href="#" @click.prevent="$store.modal.authTab = 'register'"
                                class="text-green-600 font-medium underline">create your account</a></span>
                </template>
                <template x-if="$store.modal.authTab === 'register'">
                    <span>or <a href="#" @click.prevent="$store.modal.authTab = 'login'"
                                class="text-green-600 font-medium underline">log into your account</a></span>
                </template>
            </p>

            <!-- Mobile Input -->
            <div class="flex items-center border border-gray-300 rounded px-3 py-2 mb-4">
                <img src="https://flagcdn.com/in.svg" alt="India" class="w-5 h-5 mr-2">
                <span class="text-gray-600 text-sm mr-2">+91</span>
                <input type="tel" placeholder="Enter your mobile number"
                       class="flex-1 text-sm focus:outline-none text-gray-700">
            </div>
            <!-- Action Button -->
            <button
                class="w-full py-2 rounded font-medium mb-4"
                :class="$store.modal.authTab === 'login' ? 'bg-gray-200 text-gray-700' : 'bg-blue-600 text-white hover:bg-blue-700'"
                x-text="$store.modal.authTab === 'login' ? 'Login' : 'Continue'">
            </button>

            <!-- Continue with Email (Login only) -->
            <div class="text-center" x-show="$store.modal.authTab === 'login'">
                <a href="{{ route('login') }}" class="text-sm font-semibold underline text-gray-800">Continue with email</a>
            </div>

            <!-- Help Text -->
            <p class="text-xs text-gray-500 mt-6 text-center">
                Having trouble? visit our <a href="#" class="text-blue-600 underline">Help center</a>
            </p>
        </div>
    </div>
</div>

<!-- NAVBAR -->
<nav x-data="{ open: false }" class="bg-slate-800 text-white w-full font-semibold text-xs">
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

            <!-- Auth Buttons (Desktop) -->
            <div class="hidden md:flex space-x-4 text-sm items-center sm:text-base">
                <a href="javascript:void(0)"
                   @click="$store.modal.authTab = 'login'; $store.modal.showAuth = true"
                   class="hover:text-slate-300 transition">Log in</a>

                <a href="javascript:void(0)"
                   @click="$store.modal.authTab = 'register'; $store.modal.showAuth = true"
                   class="bg-slate-600 px-4 py-2 rounded hover:bg-slate-700 transition">Join for Free</a>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="md:hidden">
                <button @click="open = !open" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open }" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{ 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
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
            <a href="javascript:void(0)"
               @click="$store.modal.authTab = 'login'; $store.modal.showAuth = true; open = false"
               class="block py-2 text-white">
                Log in
            </a>
            <a href="javascript:void(0)"
               @click="$store.modal.authTab = 'register'; $store.modal.showAuth = true; open = false"
               class="block py-2 bg-slate-600 text-center rounded mt-2 hover:bg-slate-700 transition">
                Join for Free
            </a>
        </div>
    </div>
</nav>

