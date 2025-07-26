<x-layouts.main>
    <div x-data class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-xl space-y-6 py-5">

        <!-- Breadcrumb Navigation -->
        <div class="flex flex-wrap items-center gap-2 text-sm text-gray-600">
            <button class="hover:underline">&larr;</button>
            <span>/</span>
            <button class="px-3 py-1 border rounded-full hover:bg-gray-100">Competitive Exams</button>
            <button class="px-3 py-1 border rounded-full hover:bg-gray-100">Plus</button>
            <button class="px-3 py-1 border rounded-full hover:bg-gray-100">Syllabus</button>
            <button class="px-3 py-1 border rounded-full hover:bg-gray-100">Batch Courses</button>
        </div>

        <!-- Course Header -->
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Course Preview -->
            <div x-data="{ open: false }" class="relative w-full lg:w-1/3 rounded-lg overflow-hidden bg-blue-100">
                <!-- Thumbnail -->
                <div @click="open = true" class="cursor-pointer relative">
                    <img src="https://dummyimage.com/300x200/edf2f7/555&text=Video+Preview" alt="Video Preview"
                         class="w-full object-cover">
                    <!-- Play Button -->
                    <button
                        class="absolute bottom-4 left-4 bg-white bg-opacity-80 px-3 py-1 rounded-full flex items-center gap-2 text-sm font-semibold">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M14.752 11.168l-4.596-2.65A1 1 0 009 9.26v5.48a1 1 0 001.156.987l4.596-2.65a1 1 0 000-1.74z"/>
                        </svg>
                        PREVIEW
                    </button>
                </div>

                <!-- Modal -->
                <div x-show="open" x-cloak @keydown.escape.window="open = false"
                     class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50"
                     x-transition>
                    <button @click="open = false"
                            class="absolute top-4 right-4 text-white hover:text-black text-xl font-bold">
                        &times;
                    </button>

                    <div @click.outside="open = false"
                         class="bg-white rounded-lg shadow-lg max-w-3xl w-full p-4 relative">
                        <!-- Close Button -->


                        <!-- Video -->
                        <div class="aspect-w-16 aspect-h-9 w-full">
                            <iframe class="w-full h-64 sm:h-96 rounded-lg"
                                    src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                                    title="Preview Video" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Course Info -->
            <div class="flex-1">
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-gray-200 text-xs px-2 py-1 rounded font-semibold">HINDI</span>
                </div>
                <h1 class="text-2xl font-bold leading-snug">Rapid Revision on Biology for CBT - 2</h1>
                <p class="text-gray-700 font-medium mt-1">Anand Panchal</p>
                <p class="text-gray-500 mt-3 text-sm leading-relaxed">
                    In this course, Anand Panchal will provide in-depth knowledge of Biology.
                    The course will be helpful for aspirants preparing for Railway Exams. Learners at
                    any stage of their preparation will be benefited fr...
                    <span class="text-teal-600 font-medium cursor-pointer hover:underline">Read more</span>
                </p>
            </div>
        </div>

        <!-- Course Meta Info -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-sm text-gray-700">
            <div class="flex items-start gap-3">
                <div class="bg-gray-100 p-2 rounded-lg">
                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M8 7V3M16 7V3M3 11h18M5 19h14a2 2 0 002-2v-6H3v6a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold">Ended on Feb 9</p>
                    <p class="text-gray-500 text-xs">Jan 26 – Feb 9, 2022</p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <div class="bg-gray-100 p-2 rounded-lg">
                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M15 10l4.553 2.276A1 1 0 0120 13.118V18a1 1 0 01-1 1h-6a1 1 0 01-1-1v-2.118a1 1 0 01.447-.842L15 10z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold">15 lessons</p>
                    <p class="text-gray-500 text-xs">1 quiz</p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <div class="bg-gray-100 p-2 rounded-lg">
                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold">0 practices</p>
                    <p class="text-gray-500 text-xs">0 questions by educators</p>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <button class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded font-semibold w-full">
                    Get subscription
                </button>
                <button class="p-2 border rounded hover:bg-gray-100">
                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="1.5"
                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 12v-1a9 9 0 019-9h1m0 0a9 9 0 019 9v1m-2-2h-3m3 0l-4 4m0 0l-4-4"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-data="{
    weeks: [
        {
            title: 'Week 1',
            range: 'Jan 24 - 30',
            total: 5,
            lessons: [
                { date: 'JAN 26', title: 'Session on Biology - Part I', meta: 'Lesson 1 • Jan 26 • 1h 1m' },
                { date: 'JAN 27', title: 'Session on Biology - Part II', meta: 'Lesson 2 • Jan 27 • 1h' },
                { date: 'JAN 28', title: 'Session on Biology - Part III', meta: 'Lesson 3 • Jan 28 • 1h 7m' },
                { date: 'JAN 29', title: 'Session on Biology - Part IV', meta: 'Lesson 4 • Jan 29 • 52m' },
                { date: 'JAN 30', title: 'Session on Biology - Part V', meta: 'Lesson 5 • Jan 30 • 1h 10m' }
            ]
        },
        {
            title: 'Week 2',
            range: 'Jan 31 - Feb 6',
            total: 4,
            lessons: [
                { date: 'JAN 31', title: 'Session on Physics - Part I', meta: 'Lesson 6 • Jan 31 • 1h 2m' },
                { date: 'FEB 1', title: 'Session on Physics - Part II', meta: 'Lesson 7 • Feb 1 • 58m' },
                { date: 'FEB 3', title: 'Session on Physics - Part III', meta: 'Lesson 8 • Feb 3 • 1h 5m' },
                { date: 'FEB 5', title: 'Session on Physics - Part IV', meta: 'Lesson 9 • Feb 5 • 50m' }
            ]
        },
        {
            title: 'Week 3',
            range: 'Feb 7 - 13',
            total: 3,
            lessons: [
                { date: 'FEB 8', title: 'Session on Chemistry - Part I', meta: 'Lesson 10 • Feb 8 • 1h' },
                { date: 'FEB 10', title: 'Session on Chemistry - Part II', meta: 'Lesson 11 • Feb 10 • 1h 15m' },
                { date: 'FEB 12', title: 'Session on Chemistry - Part III', meta: 'Lesson 12 • Feb 12 • 45m' }
            ]
        }
    ]
}" class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8 space-y-12">

        <template x-for="(week, wIndex) in weeks" :key="wIndex">
            <div class="bg-gray-50 p-5 rounded-xl">
                <div class="flex flex-col lg:flex-row gap-6 lg:items-start">

                    <!-- Week Header -->
                    <div class="lg:w-1/3">
                        <h2 class="text-2xl font-bold text-gray-800" x-text="week.title"></h2>
                        <p class="text-gray-500 text-sm" x-text="week.range"></p>
                        <p class="text-sm text-slate-500 mt-1" x-text="`${week.total} lessons`"></p>
                    </div>

                    <!-- Lessons List -->
                    <div class="flex-1 space-y-4">
                        <template x-for="(lesson, index) in week.lessons" :key="index">
                            <div @click="alert('Please buy a subscription to access this lesson.')"
                                 class="flex items-start justify-between bg-white shadow rounded-lg p-4 sm:p-6 cursor-pointer hover:bg-gray-50 transition">

                                <!-- Date and Info -->
                                <div class="flex items-start">
                                    <!-- Date -->
                                    <div class="w-16 shrink-0 text-center">
                                        <p class="text-xs text-gray-500 font-medium"
                                           x-text="lesson.date.split(' ')[0]"></p>
                                        <p class="text-lg font-bold text-gray-700"
                                           x-text="lesson.date.split(' ')[1]"></p>
                                    </div>

                                    <!-- Lesson Info -->
                                    <div class="ml-4">
                                        <h3 class="text-base font-semibold text-gray-800" x-text="lesson.title"></h3>
                                        <p class="text-sm text-gray-500 mt-1" x-text="lesson.meta"></p>
                                    </div>
                                </div>

                                <!-- Lock Icon -->
                                <div class="flex items-center">
                                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor"
                                         stroke-width="1.5"
                                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75M6.75 10.5h10.5A2.25 2.25 0 0 1 19.5 12.75v6.75a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5v-6.75A2.25 2.25 0 0 1 6.75 10.5Z"/>
                                    </svg>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </template>

    </div>


</x-layouts.main>
