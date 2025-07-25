<x-layouts.main>
    <div class="min-h-screen flex flex-col sm:flex-row" x-data="{ active: 'browse', search: '', menuOpen: false }">

        <!-- Mobile Menu Toggle -->
        <!-- Mobile Menu Toggle -->
        <div class="sm:hidden bg-white shadow px-4 py-3 flex justify-between items-center">
            <h2 class="text-xl font-bold">SELF STUDY</h2>
            <button @click="menuOpen = !menuOpen" class="text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75"/>
                </svg>
            </button>
        </div>


        <!-- Sidebar -->
        <aside
            :class="{'block': menuOpen, 'hidden': !menuOpen}"
            class="sm:block sm:w-64 w-full bg-white shadow-md p-6 space-y-4 sm:h-screen sm:overflow-y-auto"
        >
            <h2 class="sm:block hidden text-xl font-bold mb-4">SELF STUDY</h2>
            <nav class="space-y-2">
                @foreach([
                    'browse' => 'Browse',
                    'practice' => 'Practice',
                    'tests' => 'Tests'
                ] as $key => $label)
                    <button
                        @click="active = '{{ $key }}'; menuOpen = false"
                        :class="active === '{{ $key }}' ? 'bg-teal-100 text-teal-700 font-semibold' : ''"
                        class="w-full text-left px-4 py-2 rounded hover:bg-teal-50 flex items-center space-x-2"
                    >
                        <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>{{ $label }}</span>
                    </button>
                @endforeach

                <button class="w-full text-left px-4 py-2 rounded hover:bg-teal-50 flex items-center space-x-2">
                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Playlist</span>
                </button>

                <button class="w-full text-left px-4 py-2 rounded hover:bg-teal-50 flex items-center space-x-2">
                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M15 10l4.553 2.276A1 1 0 0120 13.118V18a1 1 0 01-1 1h-6a1 1 0 01-1-1v-2.118a1 1 0 01.447-.842L15 10z"/>
                    </svg>
                    <span>Free live classes</span>
                </button>

                <button class="w-full text-left px-4 py-2 rounded hover:bg-teal-50 flex items-center space-x-2">
                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Other courses</span>
                </button>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto h-screen bg-gray-50 p-6">
            <div class="flex justify-between items-center mb-6 flex-wrap gap-4">
                <h1 class="text-2xl sm:text-3xl font-bold">Popular courses</h1>
                <input type="text"
                       placeholder="Search..."
                       x-model="search"
                       class="border rounded px-4 py-2 focus:outline-none focus:ring focus:border-teal-400 w-full sm:w-64"/>
            </div>

            <!-- Grid Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <template x-for="course in [
    { title: 'Science for Railways Group D', tag: 'GENERAL SCIENCE', date: 'Dec 7, 2019', lessons: 40, by: 'Wifistudy P', color: 'blue' },
    { title: 'General Science through MCQs', tag: 'RRB JE NON-TECH', date: 'Sep 11, 2019', lessons: 8, by: 'Moinak Gorai', color: 'blue' },
    { title: 'Maths for NTPC', tag: 'MATHEMATICS', date: 'Mar 5, 2020', lessons: 48, by: 'Wifistudy P', color: 'red' },
    { title: 'History for SSC CGL', tag: 'HISTORY', date: 'Jan 15, 2020', lessons: 35, by: 'Neha Sharma', color: 'red' },
    { title: 'Geography Masterclass', tag: 'GEOGRAPHY', date: 'Feb 20, 2021', lessons: 22, by: 'Ravi Singh', color: 'red' },
    { title: 'Physics Crash Course', tag: 'PHYSICS', date: 'Jun 10, 2022', lessons: 18, by: 'Sandeep Sir', color: 'red' },
    { title: 'Chemistry Tricks', tag: 'CHEMISTRY', date: 'Apr 9, 2022', lessons: 25, by: 'Anjali Ma’am', color: 'blue' },
    { title: 'Biology Simplified', tag: 'BIOLOGY', date: 'May 5, 2020', lessons: 30, by: 'Dr. Aman', color: 'red' },
    { title: 'Logical Reasoning', tag: 'REASONING', date: 'Jul 1, 2021', lessons: 20, by: 'Manish Gupta', color: 'red' },
    { title: 'Current Affairs 2024', tag: 'GK', date: 'Jan 1, 2024', lessons: 50, by: 'Daily Dose', color: 'red' },
    { title: 'Polity for UPSC', tag: 'POLITY', date: 'Aug 18, 2023', lessons: 28, by: 'IAS Mentor', color: 'blue' },
    { title: 'Indian Economy', tag: 'ECONOMY', date: 'Sep 10, 2023', lessons: 27, by: 'Arvind Mehta', color: 'blue' },
    { title: 'English Grammar Basics', tag: 'ENGLISH', date: 'Oct 3, 2020', lessons: 34, by: 'Priya Singh', color: 'red' },
    { title: 'Essay Writing Tips', tag: 'ENGLISH', date: 'Nov 19, 2023', lessons: 10, by: 'Ajay Raj', color: 'red' },
    { title: 'Maths for SSC CHSL', tag: 'MATHS', date: 'Dec 1, 2023', lessons: 32, by: 'Rakesh Sir', color: 'red' },
    { title: 'Art & Culture', tag: 'GS PAPER 1', date: 'Jan 15, 2024', lessons: 16, by: 'Preeti Das', color: 'blue' },
    { title: 'General Awareness', tag: 'GK', date: 'Feb 28, 2024', lessons: 20, by: 'Gaurav Sir', color: 'red' },
    { title: 'SSC GD Mock Series', tag: 'PRACTICE', date: 'Mar 5, 2024', lessons: 12, by: 'Mock Test Hub', color: 'red' },
    { title: 'Railways Math Capsule', tag: 'MATHS', date: 'Apr 10, 2024', lessons: 24, by: 'Wifistudy P', color: 'red' },
    { title: 'Computer Awareness', tag: 'COMPUTER', date: 'May 20, 2024', lessons: 15, by: 'Anita Mam', color: 'red' }
].filter(c => c.title.toLowerCase().includes(search.toLowerCase()))" :key="course.title">

                    <div
                        class="bg-white rounded-lg shadow p-4 relative transform transition hover:-translate-y-1 hover:shadow-lg duration-300">
                        <!-- Image/Icon Area -->
                        <a href="/courses/show">
                            <div :class="`bg-${course.color}-100`"
                                 class="h-32 flex items-center justify-center rounded mb-4 relative">
                                <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                     stroke-width="1.5"
                                     viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M5.121 17.804A4 4 0 0112 15a4 4 0 016.879 2.804M15 11a3 3 0 10-6 0 3 3 0 006 0z"/>
                                </svg>
                                <div class="absolute top-2 right-2 bg-white rounded-full p-1 shadow">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Text Content -->
                            <p class="text-sm text-gray-500 uppercase font-semibold">
                                ENGLISH <span :class="`text-${course.color}-600`" x-text="course.tag"></span>
                            </p>
                            <h2 class="font-bold mt-2 text-lg" x-text="course.title"></h2>
                            <p class="text-gray-400 text-sm mt-1"
                               x-text="`Ended on ${course.date} • ${course.lessons} lessons`"></p>
                            <p class="mt-1 font-medium text-sm" x-text="course.by"></p>

                        </a>
                    </div>
                </template>
            </div>
        </main>
    </div>
</x-layouts.main>
