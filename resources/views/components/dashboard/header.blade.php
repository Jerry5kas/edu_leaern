<!-- Sticky Navbar -->
<nav class="bg-white shadow-sm border-b sticky top-0 z-50" x-data="{ profileOpen: false, menuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="text-xl font-bold text-slate-800">
                <a href="{{ route('dashboard') }}">
                    EduLearn
                </a>
            </div>

            <!-- Search Box with Suggestions -->
            <div x-data="searchComponent()" class="relative w-full max-w-md mx-auto">
                <input
                    type="text"
                    x-model="query"
                    @input="filterResults"
                    @focus="open = true"
                    @keydown.escape.window="open = false"
                    placeholder="Search courses, topics, etc."
                    class="w-full px-4 py-2 border border-gray-300 rounded-full shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"
                >

                <!-- Suggestions Dropdown -->
                <ul
                    x-show="open && filtered.length"
                    x-transition
                    @click.outside="open = false"
                    class="absolute z-50 mt-1 w-full bg-white border border-gray-200 rounded-lg shadow-md max-h-60 overflow-y-auto"
                >
                    <template x-for="(item, index) in filtered" :key="index">
                        <li
                            @click="selectResult(item)"
                            class="px-4 py-2 text-sm text-gray-800 hover:bg-blue-50 cursor-pointer"
                            x-text="item"
                        ></li>
                    </template>
                </ul>

                <!-- No Results -->
                <div
                    x-show="open && query && filtered.length === 0"
                    class="absolute z-50 mt-1 w-full bg-white border border-gray-200 rounded-lg shadow-md text-sm text-gray-600 px-4 py-2"
                >
                    No results found.
                </div>
            </div>

            <script>
                function searchComponent() {
                    return {
                        query: '',
                        open: false,
                        results: [
                            'Laravel 11 Fundamentals',
                            'Advanced Tailwind CSS',
                            'JavaScript for Beginners',
                            'Mastering Alpine.js',
                            'React Native Basics',
                            'Vue 3 Crash Course',
                            'Laravel + Flutter Integration',
                            'Livewire Deep Dive',
                            'REST API with Laravel',
                            'Deploying with Vercel',
                        ],
                        filtered: [],
                        filterResults() {
                            const q = this.query.toLowerCase();
                            this.filtered = this.results.filter(item => item.toLowerCase().includes(q));
                        },
                        selectResult(item) {
                            this.query = item;
                            this.open = false;
                            console.log("Selected:", item);
                        }
                    };
                }
            </script>

            <!-- Right Section -->
            <div class="flex items-center space-x-4">
                <!-- Notification Icon -->
                <button class="relative p-2 rounded-full hover:bg-gray-100 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                </button>

                <!-- Expert Info (hidden on mobile) -->
                <div class="hidden md:block text-right">
                    <p class="text-xs text-gray-500">Talk to our experts</p>
                    <p class="text-sm font-medium text-slate-700">+91 90876 54321</p>
                </div>

                <!-- Profile Button -->
                <div class="relative">
                    @php
                        $user = Auth::user();
                    @endphp

                    <button @click="profileOpen = !profileOpen"
                            class="w-10 h-10 rounded-full border border-gray-300 shadow-sm overflow-hidden focus:outline-none">
                        @if($user && $user->profile)
                            <img src="{{ asset('storage/profile_images/' . $user->profile) }}"
                                 alt="Profile" class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('default-avatar.svg') }}"
                                 alt="Default Profile" class="w-full h-full object-cover">
                        @endif
                    </button>

                    <!-- ✅ Single Profile Dropdown -->
                    <div x-show="profileOpen" @click.outside="profileOpen = false" x-transition
                         class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50 overflow-hidden">
                        @if($user)
                            <p class="block px-4 py-2 text-sm hover:bg-gray-100 text-gray-800">{{ $user->name }}</p>
                        @else
                            <p class="block px-4 py-2 text-sm hover:bg-gray-100 text-gray-800">Guest</p>
                        @endif

                        <!-- View Profile -->
                        <a href="{{ route('profile') }}"
                           class="block px-4 py-2 text-sm hover:bg-gray-100 text-gray-800">View Profile</a>

                        <!-- Cart Option -->
                        <a href="/cart" class="flex items-center px-4 py-2 text-sm hover:bg-gray-100 text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3
                                      3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3
                                      2.1-4.684 2.924-7.138a60.114
                                      60.114 0 0 0-16.536-1.84M7.5
                                      14.25 5.106 5.272M6 20.25a.75.75
                                      0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75
                                      0a.75.75 0 1 1-1.5 0 .75.75 0
                                      0 1 1.5 0Z" />
                            </svg>
                            My Cart
                        </a>
                            <!-- ✅ Added Notification Link -->
                            <a href="/notifications" class="flex items-center px-4 py-2 text-sm hover:bg-gray-100 text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967
              8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967
              8.967 0 0 1-2.312 6.022c1.733.64 3.56
              1.085 5.455 1.31m5.714 0a24.255
              24.255 0 0 1-5.714 0m5.714
              0a3 3 0 1 1-5.714 0" />
                                </svg>
                                Notifications
                            </a>

                            <!-- Settings -->
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100 text-gray-800">Settings</a>

                        <div class="border-t"></div>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-red-600 font-medium">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Hamburger Button (Mobile) -->
                <button @click="menuOpen = !menuOpen" class="md:hidden focus:outline-none">
                    <svg x-show="!menuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="menuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="menuOpen" x-transition class="md:hidden px-4 pb-4">
        <div class="pt-2 space-y-2 border-t border-gray-200">
            <a href="{{ route('dashboard') }}" class="block py-2 text-gray-700 font-medium">Dashboard</a>
            <a href="{{ route('courses.index') }}" class="block py-2 text-gray-700 font-medium">Courses</a>
            <a href="/cart" class="block py-2 text-gray-700 font-medium">My Cart</a>
            <a href="/checkout" class="block py-2 text-gray-700 font-medium">Notification</a>
            <a href="#" class="block py-2 text-gray-700 font-medium">Support</a>
            <div class="pt-2 border-t border-gray-100">
                <a href="#" class="block py-2 text-gray-700">+91 90876 54321</a>
            </div>
        </div>
    </div>
</nav>
