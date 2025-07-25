<!-- Sticky Navbar -->
<nav class="bg-white shadow-sm border-b sticky top-0 z-50" x-data="{ profileOpen: false, menuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <div class="text-xl font-bold text-slate-800">
                <a href="/dashboard">
                    Edu learn
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
                            // Navigate or trigger form submit
                            console.log("Selected:", item);
                        }
                    };
                }
            </script>


            <!-- Alpine.js CDN -->


            <!-- Right Section -->
            <div class="flex items-center space-x-4">
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
                            <!-- Default avatar if no profile uploaded -->
                            <img src="{{ asset('default-avatar.png') }}"
                                 alt="Default Profile" class="w-full h-full object-cover">
                        @endif
                    </button>
                    <!-- Profile Dropdown -->
                    <div x-show="profileOpen" @click.outside="profileOpen = false" x-transition
                         class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50 overflow-hidden">
                        @if($user)
                            <p class="block px-4 py-2 text-sm hover:bg-gray-100 text-gray-800">{{ $user->name }}</p>
                        @else
                            <p class="block px-4 py-2 text-sm hover:bg-gray-100 text-gray-800">Guest</p>
                        @endif
                        <a href="{{ route('auth.profile') }}"
                           class="block px-4 py-2 text-sm hover:bg-gray-100 text-gray-800">View Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100 text-gray-800">Settings</a>
                        <div class="border-t"></div>
                        <a href="{{ route('home.login') }}"
                           class="block px-4 py-2 text-sm hover:bg-gray-100 text-red-600 font-medium">Logout</a>
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
            <a href="#" class="block py-2 text-gray-700 font-medium">Dashboard</a>
            <a href="#" class="block py-2 text-gray-700 font-medium">Courses</a>
            <a href="#" class="block py-2 text-gray-700 font-medium">Support</a>
            <div class="pt-2 border-t border-gray-100">
                <a href="#" class="block py-2 text-gray-700">+91 90876 54321</a>
            </div>
        </div>
    </div>
</nav>
