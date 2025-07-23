<div class="flex justify-center items-center sm:h-screen h-auto  p-6">
<div class=" bg-white rounded-2xl shadow-xl shadow-slate-300 overflow-hidden max-w-6xl mx-auto my-6 px-4 py-6"
     x-data="{ open: false }"
>
    <div class="flex flex-col md:flex-row gap-6 items-center">

        <!-- Image Section -->
        <div class="w-full md:w-1/2">
            <img
                src="https://ik.imagekit.io/demo/img/image4.jpeg"
                alt="Unacademy Centre"
                class="rounded-xl w-full object-cover"
            />
        </div>

        <!-- Content Section -->
        <div class="w-full md:w-1/2 space-y-3">
            <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">Introducing ✨</p>

            <h3 class="text-2xl sm:text-3xl font-bold text-gray-800">
                E-learn Centres for IIT JEE and NEET UG
            </h3>

            <p class="text-gray-500 text-sm sm:text-base">
                Admissions open in Kota, Delhi, Chandigarh, Sikar, Indore and 20+ other cities!
            </p>

            <ul class="space-y-2 text-sm sm:text-base text-gray-700">
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                    Learn from top educators in your city
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                    In-person classes & doubt solving
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                    Bonus access to online learning
                </li>
            </ul>

            <!-- Button -->
            <button
                @click="open = true"
                class="mt-4 bg-gray-800 text-white text-sm sm:text-base font-semibold px-5 py-3 rounded-lg hover:bg-gray-700 transition"
            >
                Find a centre
            </button>
        </div>
    </div>
</div>
</div>



<div class="max-w-6xl mx-auto w-full px-4 py-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Card 1 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <div class="bg-blue-400 p-6 flex justify-center items-center">
                <img src="https://img.icons8.com/color/96/classroom.png" alt="Live Class" class="h-28">
            </div>
            <div class="p-5">
                <h3 class="text-xl font-semibold mb-2">Daily live classes</h3>
                <p class="text-sm text-gray-600">
                    Chat with educators, ask questions, answer live polls, and get your doubts cleared – all while the class is going on
                </p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <div class="bg-red-300 p-6 flex justify-center items-center">
                <img src="https://img.icons8.com/color/96/task.png" alt="Practice and Revise" class="h-28">
            </div>
            <div class="p-5">
                <h3 class="text-xl font-semibold mb-2">Practice and revise</h3>
                <p class="text-sm text-gray-600">
                    Learning isn’t just limited to classes with our practice section, mock tests and lecture notes shared as PDFs for your revision
                </p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <div class="bg-yellow-300 p-6 flex justify-center items-center">
                <img src="https://img.icons8.com/color/96/laptop.png" alt="Learn Anytime" class="h-28">
            </div>
            <div class="p-5">
                <h3 class="text-xl font-semibold mb-2">Learn anytime, anywhere</h3>
                <p class="text-sm text-gray-600">
                    One subscription gets you access to all our live and recorded classes to watch from the comfort of any of your devices
                </p>
            </div>
        </div>

    </div>
</div>
