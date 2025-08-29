<!-- Sticky Navbar -->
<nav class="bg-white shadow-sm border-b sticky top-0 z-50"
     x-data="{ profileOpen: false, menuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo and Navigation -->
            <div class="flex items-center space-x-8">
                <div class="text-xl font-bold text-slate-800">
                    <a href="{{ route('dashboard') }}">
                        EduLearn
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-6">


                </div>
{{--                <div class="hidden md:flex items-center space-x-6">--}}
{{--                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>--}}
{{--                    <a href="{{ route('courses.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Courses</a>--}}
{{--                </div>--}}
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

            <!-- Right Section -->
            <div class="flex items-center space-x-4">
                <!-- Expert Info (hidden on mobile) -->
                <div class="hidden md:block text-right">
                    <p class="text-xs text-gray-500">Talk to our experts</p>
                    <p class="text-sm font-medium text-slate-700">+91 90876 54321</p>
                </div>

                <!-- ✅ Notification Dropdown -->
                <div x-data="notificationBar()" class="relative">
                    <button @click="open = !open" class="relative p-2 rounded-full hover:bg-gray-100">
                        <!-- Bell Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-6 w-6 text-gray-700" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032
                                  0 0118 14.158V11a6.002 6.002
                                  0 00-4-5.659V5a2 2 0 10-4
                                  0v.341C7.67 6.165 6 8.388 6
                                  11v3.159c0 .538-.214 1.055-.595
                                  1.436L4 17h5m6 0v1a3 3 0
                                  11-6 0v-1m6 0H9"/>
                        </svg>
                        <!-- Red Dot -->
                        <span x-show="unreadCount() > 0"
                              class="absolute top-1 right-1 block h-2 w-2 rounded-full bg-red-500"></span>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" @click.away="open = false"
                         class="absolute right-0 mt-3 w-96 max-w-sm bg-white rounded-xl shadow-lg border overflow-hidden z-50">
                        <!-- Header -->
                        <div class="flex justify-between items-center px-4 py-3 border-b">
                            <h2 class="text-lg font-semibold text-gray-800">Notification</h2>
                            <button @click="markAllRead"
                                    class="text-sm text-blue-600 hover:underline">
                                Mark as read ✓
                            </button>
                        </div>

                        <!-- Notifications List -->
                        <div class="max-h-96 overflow-y-auto divide-y">
                            <!-- Group: Today -->
                            <template x-if="grouped.today.length">
                                <div>
                                    <div class="px-4 py-2 text-xs font-semibold text-gray-500 bg-gray-50">Today</div>
                                    <template x-for="note in grouped.today" :key="note.id">
                                        <div class="p-4 hover:bg-gray-50 flex gap-3">
                                            <div class="w-10 h-10 flex items-center justify-center rounded-full"
                                                 :class="note.iconBg">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="h-6 w-6"
                                                     :class="note.iconColor" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor"
                                                     x-html="note.icon"></svg>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-sm text-gray-800" x-text="note.message"></p>
                                                <template x-if="note.points">
                                                    <div class="mt-1">
                                                        <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full"
                                                              x-text="'+' + note.points + ' Points'"></span>
                                                    </div>
                                                </template>
                                                <span class="text-xs text-gray-500" x-text="note.time"></span>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </template>

                            <!-- Group: Yesterday -->
                            <template x-if="grouped.yesterday.length">
                                <div>
                                    <div class="px-4 py-2 text-xs font-semibold text-gray-500 bg-gray-50">Yesterday</div>
                                    <template x-for="note in grouped.yesterday" :key="note.id">
                                        <div class="p-4 hover:bg-gray-50 flex gap-3">
                                            <div class="w-10 h-10 flex items-center justify-center rounded-full"
                                                 :class="note.iconBg">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="h-6 w-6"
                                                     :class="note.iconColor" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor"
                                                     x-html="note.icon"></svg>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-sm text-gray-800" x-text="note.message"></p>
                                                <template x-if="note.attachment">
                                                    <div class="mt-1 text-sm text-blue-600 underline cursor-pointer"
                                                         x-text="note.attachment"></div>
                                                </template>
                                                <span class="text-xs text-gray-500" x-text="note.time"></span>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
                <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-blue-600 font-medium relative">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor"
                         class="w-6 h-6">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M2.25 2.25h1.386c.51 0 .955.343 1.087.835l.383 1.437m0 0L6.75 12h10.5l2.25-6.75H6.75m-1.644-2.478L6.75 12m0 0l-1.5 4.5h12.75m-12.75 0A1.5 1.5 0 106.75 21a1.5 1.5 0 00-1.5-1.5zm12.75 0a1.5 1.5 0 101.5 1.5 1.5 1.5 0 00-1.5-1.5z" />
                    </svg>
                    <span id="cart-count" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                </a>
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

                    <!-- Profile Dropdown -->
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

                        <!-- Cart Option --> <a href="/cart" class="flex items-center px-4 py-2 text-sm hover:bg-gray-100 text-gray-800"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2"> <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" /> </svg> My Cart </a>

                        <a href="/wishlist" class="flex items-center px-4 py-2 text-sm hover:bg-gray-100 text-gray-800"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2"> <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/> </svg> Wishlist </a>
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

                <!-- Hamburger (Mobile) -->
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
            <a href="{{ route('enrollments.index') }}" class="block py-2 text-gray-700 font-medium">My Courses</a>
            <a href="{{ route('cart.index') }}" class="block py-2 text-gray-700 font-medium">Cart</a>
            <a href="/wishlist" class="block py-2 text-gray-700 font-medium">Wishlist</a>
            <a href="#" class="block py-2 text-gray-700 font-medium">Support</a>
            <div class="pt-2 border-t border-gray-100">
                <a href="#" class="block py-2 text-gray-700">+91 90876 54321</a>
            </div>
        </div>
    </div>
</nav>

<!-- Alpine JS Scripts -->
<script>
    // Update cart count
    function updateCartCount() {
        fetch('{{ route('cart.count') }}')
            .then(response => response.json())
            .then(data => {
                const cartCount = document.getElementById('cart-count');
                if (cartCount) {
                    cartCount.textContent = data.count;
                    if (data.count > 0) {
                        cartCount.style.display = 'flex';
                    } else {
                        cartCount.style.display = 'none';
                    }
                }
            })
            .catch(error => console.error('Error updating cart count:', error));
    }

    // Update cart count on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateCartCount();
    });
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

    function notificationBar() {
        return {
            open: false,
            notifications: [
                {
                    id: 1,
                    group: "today",
                    message: '"Mobile & Desktop Screen Pattern" Course has been assigned for you to learn.',
                    time: "32 min ago",
                    icon: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14l9-5-9-5-9 5 9 5zm0
                        7v-7m0 0L3 9m9 5l9-5"/>`,
                    iconBg: "bg-blue-100",
                    iconColor: "text-blue-600",
                    read: false
                },
                {
                    id: 2,
                    group: "today",
                    message: '"General knowledge & Methodology" Page has been updated.',
                    time: "4 hours ago",
                    icon: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M12
                        20a8 8 0 100-16 8 8 0 000 16z"/>`,
                    iconBg: "bg-red-100",
                    iconColor: "text-red-600",
                    read: false
                },
                {
                    id: 3,
                    group: "today",
                    message: '"The Designing User-Centric Learn..." has been completely reviewed by Trainer.',
                    time: "11:22 AM",
                    points: 100,
                    icon: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 17l-5-5m0 0l5-5m-5
                        5h12"/>`,
                    iconBg: "bg-green-100",
                    iconColor: "text-green-600",
                    read: false
                },
                {
                    id: 4,
                    group: "yesterday",
                    message: "You have received a certificate for completing the course.",
                    time: "25 November, 2023 • 10:11 AM",
                    attachment: "E-Certificate_Aditya_Irawan.pdf",
                    icon: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m2 4H7a2 2 0 01-2-2V6a2
                        2 0 012-2h10a2 2 0 012
                        2v8a2 2 0 01-2 2z"/>`,
                    iconBg: "bg-purple-100",
                    iconColor: "text-purple-600",
                    read: true
                }
            ],
            get grouped() {
                return {
                    today: this.notifications.filter(n => n.group === "today"),
                    yesterday: this.notifications.filter(n => n.group === "yesterday")
                }
            },
            unreadCount() {
                return this.notifications.filter(n => !n.read).length;
            },
            markAllRead() {
                this.notifications.forEach(n => n.read = true);
            }
        }
    }
</script>
