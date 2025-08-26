
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

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Google Login Button -->
            <div class="mb-6">
                <a href="{{ route('google.login') }}"
                   class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    Continue with Google
                </a>
            </div>

            <!-- Divider -->
            <div class="relative mb-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">Or continue with email</span>
                </div>
            </div>

            <!-- Email/Password Forms -->
            <form x-data="{ showPassword: false, showConfirmPassword: false }"
                  :action="$store.modal.authTab === 'login' ? '{{ route('auth.login') }}' : '{{ route('auth.register') }}'"
                  method="POST" class="space-y-4">
                @csrf

                <!-- Name field (only for register) -->
                <div x-show="$store.modal.authTab === 'register'" x-transition>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" name="name" id="name" required
                           value="{{ old('name') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('name') border-red-500 @enderror"
                           placeholder="Enter your full name">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" name="email" id="email" required
                           value="{{ old('email') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('email') border-red-500 @enderror"
                           placeholder="Enter your email address">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'" name="password" id="password" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('password') border-red-500 @enderror"
                               placeholder="Enter your password">
                        <button type="button" @click="showPassword = !showPassword"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3.98 8.223A10.477 10.477 0 002.036 12.32a1.012 1.012 0 000 .639C3.423 16.49 7.36 19.5 12 19.5c1.95 0 3.767-.5 5.322-1.377M6.228 6.228A10.451 10.451 0 0112 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639a10.451 10.451 0 01-1.293 2.366M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password field (only for register) -->
                <div x-show="$store.modal.authTab === 'register'" x-transition>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <div class="relative">
                        <input :type="showConfirmPassword ? 'text' : 'password'" name="password_confirmation" id="password_confirmation" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="Confirm your password">
                        <button type="button" @click="showConfirmPassword = !showConfirmPassword"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg x-show="!showConfirmPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <svg x-show="showConfirmPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3.98 8.223A10.477 10.477 0 002.036 12.32a1.012 1.012 0 000 .639C3.423 16.49 7.36 19.5 12 19.5c1.95 0 3.767-.5 5.322-1.377M6.228 6.228A10.451 10.451 0 0112 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639a10.451 10.451 0 01-1.293 2.366M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember me (only for login) -->
                <div x-show="$store.modal.authTab === 'login'" x-transition class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full py-3 px-4 rounded-md font-medium text-white transition-colors"
                        :class="$store.modal.authTab === 'login' ? 'bg-green-600 hover:bg-green-700' : 'bg-blue-600 hover:bg-blue-700'"
                        x-text="$store.modal.authTab === 'login' ? 'Sign In' : 'Create Account'">
                </button>
            </form>

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
                <a href="{{ route('home') }}" class="hover:text-slate-300 transition">EduLearn</a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-6 lg:space-x-8 text-sm sm:text-base">
                <a href="{{ route('home') }}" class="hover:text-slate-300 transition">Home</a>
                <a href="{{ route('courses.index') }}" class="hover:text-slate-300 transition">Courses</a>
                <a href="#" class="hover:text-slate-300 transition">About</a>
            </div>

            <!-- Auth Buttons (Desktop) -->
            <div class="hidden md:flex space-x-4 text-sm items-center sm:text-base">
                @auth
                    <div class="flex items-center space-x-4">
                        <span class="text-slate-300">Welcome, {{ Auth::user()->name }}</span>
                        <a href="{{ route('dashboard') }}" class="hover:text-slate-300 transition">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="hover:text-slate-300 transition">Logout</button>
                        </form>
                    </div>
                @else
                    <a href="javascript:void(0)"
                       @click="$store.modal.authTab = 'login'; $store.modal.showAuth = true"
                       class="hover:text-slate-300 transition">Log in</a>

                    <a href="javascript:void(0)"
                       @click="$store.modal.authTab = 'register'; $store.modal.showAuth = true"
                       class="bg-slate-600 px-4 py-2 rounded hover:bg-slate-700 transition">Join for Free</a>
                @endauth
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
        <a href="{{ route('home') }}" class="block py-2 border-b border-slate-600">Home</a>
        <a href="{{ route('courses.index') }}" class="block py-2 border-b border-slate-600">Courses</a>
        <a href="#" class="block py-2 border-b border-slate-600">About</a>

        <div class="pt-2 border-t border-slate-600">
            @auth
                <div class="space-y-2">
                    <span class="block py-2 text-slate-300">Welcome, {{ Auth::user()->name }}</span>
                    <a href="{{ route('dashboard') }}" class="block py-2 text-white">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left py-2 text-white">Logout</button>
                    </form>
                </div>
            @else
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
            @endauth
        </div>
    </div>
</nav>

