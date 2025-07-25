<div class="w-full max-w-6xl mx-auto px-4 py-10">
    <!-- Header -->
    <div class="text-center">
        <h1 class="text-4xl font-bold mb-2">Crack Competitive Exams with <span class="text-[#0f172a]">Edu Learn</span>
        </h1>
        <p class="text-lg text-gray-600">Over <span class="text-green-500 font-semibold">10k </span> learners trust us
            for online and offline coaching</p>
    </div>

    <!-- Buttons -->
    <div class="mt-6 flex flex-col sm:flex-row justify-center items-center gap-4">
        <button
            class="px-6 py-3 border border-gray-800 rounded-md font-medium hover:bg-gray-800 hover:text-white transition">
            Try learning for free
        </button>
        <button class="px-6 py-3 bg-green-500 text-white font-medium rounded-md hover:bg-green-600 transition">
            View subscription plans
        </button>
    </div>

    <!-- Features Grid -->
    <div x-data class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Live Classes -->
        <div @click="alert('Please buy subscription')"
             class="border cursor-pointer rounded-xl p-5 hover:shadow-md transition">
            <div class="flex items-center gap-3 mb-2">
                <!-- Video Camera Icon -->
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M4 6h8a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z"/>
                </svg>
                <h3 class="font-semibold text-lg">Live classes</h3>
            </div>
            <p class="text-sm text-gray-600">Watch free online coaching classes by our best educators.</p>
        </div>

        <!-- Top Educators -->
        <div @click="alert('Please buy subscription')"
             class="border cursor-pointer rounded-xl p-5 hover:shadow-md transition">
            <div class="flex items-center gap-3 mb-2">
                <!-- User Icon -->
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M5.121 17.804A8.966 8.966 0 0112 15c2.21 0 4.214.805 5.879 2.137M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <h3 class="font-semibold text-lg">Top educators</h3>
            </div>
            <p class="text-sm text-gray-600">Learn from some of the best educators in the country.</p>
        </div>

        <!-- Batches -->
        <div @click="alert('Please buy subscription')"
             class="border cursor-pointer rounded-xl p-5 hover:shadow-md transition">

            <div class="flex items-center gap-3 mb-2">
                <!-- Users Icon -->
                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M9 20H4v-2a3 3 0 015.356-1.857M15 11a3 3 0 100-6 3 3 0 000 6zM9 11a3 3 0 100-6 3 3 0 000 6z"/>
                </svg>
                <h3 class="font-semibold text-lg">Batches</h3>
            </div>
            <p class="text-sm text-gray-600">Curated batches to simplify the learning journey for your goal.</p>
        </div>

        <!-- Courses -->
        <div class="border cursor-pointer ring-1 ring-indigo-500 rounded-xl p-5 hover:shadow-md transition">
            <a href="/courses">
                <div class="flex items-center gap-3 mb-2">
                    <!-- Book Open Icon -->
                    <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M12 6v6m0 0v6m0-6H6m6 0h6"/>
                    </svg>
                    <h3 class="font-semibold text-lg">Courses</h3>
                </div>
                <p class="text-sm text-gray-600">Learn every subject in detail from your favourite educator.</p>
            </a>
        </div>

        <!-- Playlist -->
        <div @click="alert('Please buy subscription')"
             class="border cursor-pointer rounded-xl p-5 hover:shadow-md transition">
            <div class="flex items-center gap-3 mb-2">
                <!-- Collection Icon -->
                <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                </svg>
                <h3 class="font-semibold text-lg">Playlist</h3>
            </div>
            <p class="text-sm text-gray-600">High quality lecture videos for the entire syllabus for all your
                subjects.</p>
        </div>

        <!-- Practice -->
        <div @click="alert('Please buy subscription')"
             class="border cursor-pointer rounded-xl p-5 hover:shadow-md transition">
            <div class="flex items-center gap-3 mb-2">
                <!-- Lightning Bolt Icon -->
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                <h3 class="font-semibold text-lg">Practice</h3>
            </div>
            <p class="text-sm text-gray-600">Strengthen your exam preparation with adaptive practice tests.</p>
        </div>

        <!-- Test Series -->
        <div @click="alert('Please buy subscription')"
             class="border cursor-pointer rounded-xl p-5 hover:shadow-md transition">
            <div class="flex items-center gap-3 mb-2">
                <!-- Clipboard List Icon -->
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V5a2 2 0 012-2h2.586A2 2 0 0112 3.414L13.414 5H17a2 2 0 012 2v13a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="font-semibold text-lg">Test series</h3>
            </div>
            <p class="text-sm text-gray-600">Evaluate and boost your exam preparation with test series.</p>
        </div>

    </div>
</div>
