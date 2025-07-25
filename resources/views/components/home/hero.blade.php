<!-- Page Body -->
<div class="min-h-screen bg-white font-[Outfit] flex flex-col lg:flex-row items-center justify-center px-4 gap-y-12 lg:gap-x-12 py-10">
    <!-- Left Section: Text + Form -->
    <div class="w-full lg:w-1/2 space-y-6 text-center lg:text-left">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
            Crack your goal with <br>
            India’s top educators
        </h1>
        <p class="text-gray-600">
            Over <span class="text-green-500 font-semibold">10k</span> learners trust us for their preparation
        </p>

        <!-- Form -->
        <div class="space-y-4" x-data="{ open: false, selectedCode: '+91' }">
            <!-- Mobile Input with Country Code -->
            <div class="relative">
                <div
                    class="flex items-center border border-gray-300 rounded-lg px-4 py-3 text-left w-full focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500"
                >
                    <!-- Flag and Code -->
                    <div class="flex items-center space-x-2 cursor-pointer" @click="open = !open">
                        <img src="https://flagcdn.com/w40/in.png" alt="India Flag" class="w-6 h-4 rounded">
                        <span class="text-gray-800 text-sm font-medium" x-text="selectedCode"></span>
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>

                    <!-- Country Dropdown -->
                    <div
                        x-show="open" @click.outside="open = false"
                        class="absolute z-10 top-14 left-0 w-40 bg-white shadow-md border rounded text-left"
                    >
                        <ul class="text-sm">
                            <li @click="selectedCode='+91'; open=false"
                                class="px-4 py-2 hover:bg-gray-100 cursor-pointer flex items-center space-x-2">
                                <img src="https://flagcdn.com/w40/in.png" class="w-5 h-3.5" alt=""> <span>+91 India</span>
                            </li>
                            <li @click="selectedCode='+1'; open=false"
                                class="px-4 py-2 hover:bg-gray-100 cursor-pointer flex items-center space-x-2">
                                <img src="https://flagcdn.com/w40/us.png" class="w-5 h-3.5" alt=""> <span>+1 USA</span>
                            </li>
                            <li @click="selectedCode='+44'; open=false"
                                class="px-4 py-2 hover:bg-gray-100 cursor-pointer flex items-center space-x-2">
                                <img src="https://flagcdn.com/w40/gb.png" class="w-5 h-3.5" alt=""> <span>+44 UK</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Input Field -->
                    <input type="tel" placeholder="Enter your mobile number"
                           class="ml-4 flex-1 outline-none text-sm text-gray-700 bg-transparent">
                </div>
            </div>

            <!-- Info -->
            <p class="text-xs text-gray-500">We’ll send an OTP for verification</p>

            <!-- Submit Button -->
            <button class="w-full bg-gray-800 hover:bg-gray-900 text-white py-3 rounded-lg font-semibold">
                Join for free
            </button>
        </div>
    </div>

    <!-- Right Section: Illustration -->
    <div class="w-full sm:w-3/4 md:w-2/3 lg:w-1/3">
        <x-storysets.edu1 />
    </div>
</div>

