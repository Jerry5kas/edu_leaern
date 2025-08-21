
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
            <div
                x-data="countrySelector()"
                x-init="loadCountries()"
                class="w-80 mx-auto mt-6 mb-4 relative"
            >
                <!-- Selected country (input wrapper) -->
                <div class="flex items-center border border-gray-300 rounded px-3 py-2 relative">
                    <!-- Country selector trigger -->
                    <div class="flex items-center cursor-pointer mr-2" @click="open = !open">
                        <img :src="selected.flag" alt="" class="w-5 h-5 mr-2">
                        <span class="text-gray-600 text-sm" x-text="selected.dial_code"></span>
                        <svg class="w-4 h-4 text-gray-500 ml-1 transform"
                             :class="open ? 'rotate-180' : ''"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>

                    <!-- Phone input -->
                    <input type="tel" placeholder="Enter your mobile number"
                           class="flex-1 text-sm focus:outline-none text-gray-700">
                </div>

                <!-- Dropdown -->
                <div x-show="open"
                     @click.away="open = false"
                     class="absolute mt-1 w-80 bg-white border border-gray-200 rounded shadow-lg max-h-56 overflow-y-auto z-10">
                    <template x-for="(country, code) in countries" :key="code">
                        <div @click="selectCountry(country)"
                             class="flex items-center px-3 py-2 hover:bg-gray-100 cursor-pointer">
                            <img :src="country.flag" class="w-5 h-5 mr-2" :alt="country.name">
                            <span class="text-sm text-gray-700" x-text="country.name"></span>
                            <span class="ml-auto text-xs text-gray-500" x-text="country.dial_code"></span>
                        </div>
                    </template>
                </div>
            </div>

            <div x-data="{ showPw: false, showConfirmPw: false }" class="space-y-4 mb-4">
                <!-- Password -->
                <div class="relative flex items-center border border-gray-300 rounded px-3 py-2">
                    <input :type="showPw ? 'text' : 'password'"
                           placeholder="Enter your password"
                           class="flex-1 text-sm focus:outline-none text-gray-700">
                    <button type="button"
                            @click="showPw = !showPw"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none">
                        <!-- Eye icon -->
                        <svg x-show="!showPw" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <!-- Eye Slash -->
                        <svg x-show="showPw" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.98 8.223A10.477 10.477 0 002.036 12.32a1.012 1.012 0 000 .639C3.423 16.49 7.36 19.5 12 19.5c1.95 0 3.767-.5 5.322-1.377M6.228 6.228A10.451 10.451 0 0112 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639a10.451 10.451 0 01-1.293 2.366M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65"/>
                        </svg>
                    </button>
                </div>

                <!-- Confirm Password (only in Register mode) -->
                <div x-show="$store.modal.authTab === 'register'"
                     x-transition
                     class="relative flex items-center border border-gray-300 rounded px-3 py-2">
                    <input :type="showConfirmPw ? 'text' : 'password'"
                           placeholder="Enter your confirm password"
                           class="flex-1 text-sm focus:outline-none text-gray-700">
                    <button type="button"
                            @click="showConfirmPw = !showConfirmPw"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none">
                        <!-- Eye icon -->
                        <svg x-show="!showConfirmPw" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <!-- Eye Slash -->
                        <svg x-show="showConfirmPw" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.98 8.223A10.477 10.477 0 002.036 12.32a1.012 1.012 0 000 .639C3.423 16.49 7.36 19.5 12 19.5c1.95 0 3.767-.5 5.322-1.377M6.228 6.228A10.451 10.451 0 0112 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639a10.451 10.451 0 01-1.293 2.366M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65"/>
                        </svg>
                    </button>
                </div>
            </div>


            <!-- Action Button -->
            <button
                class="w-full py-2 rounded font-medium my-4"
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

<script>
    function countrySelector() {
        return {
            countries: {},
            selected: { name: "India", dial_code: "+91", flag: "https://flagcdn.com/in.svg" },
            open: false,
            async loadCountries() {
                let res = await fetch("/country.json"); // 👈 your json file in /public
                this.countries = await res.json();
            },
            selectCountry(country) {
                this.selected = country;
                this.open = false;
            }
        }
    }
</script>

