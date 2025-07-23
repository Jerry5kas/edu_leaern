<!-- x-cloak to prevent flicker -->
<style>
    [x-cloak] { display: none !important; }
</style>

<div class="px-4 sm:px-6 lg:px-12 py-10 font-[Outfit]"
     x-data="{
        query: '',
        show: false,
        activeIndex: 0,
        hovering: false,
        goals: [
          { name: 'UPSC CSE - GS', icon: '🏛️' },
          { name: 'NEET UG', icon: '🧬' },
          { name: 'NTA-UGC-NET & SET Exams', icon: '📈' },
          { name: 'UPSC CSE - Optional', icon: '📝' }
        ],
        get filtered() {
          return this.query === ''
            ? []
            : this.goals.filter(g => g.name.toLowerCase().includes(this.query.toLowerCase()));
        },
        onArrowDown() {
          if (this.activeIndex < this.filtered.length - 1) this.activeIndex++;
        },
        onArrowUp() {
          if (this.activeIndex > 0) this.activeIndex--;
        },
        onEnter() {
          if (this.filtered[this.activeIndex]) {
            this.query = this.filtered[this.activeIndex].name;
            this.show = false;
          }
        },
        onSelect(name) {
          this.query = name;
          this.show = false;
        }
     }"
     @keydown.escape.window="show = false"
     @click.outside="if (!hovering) show = false"
>
    <!-- Heading -->
    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">Select your goal / exam</h2>
    <p class="text-sm text-gray-600 mb-4">
        <span class="text-green-600 font-semibold">200+</span> exams available for your preparation
    </p>

    <!-- Input -->
    <div class="relative">
        <div class="flex items-center px-4 py-3 rounded-lg border border-gray-200 shadow-sm bg-white focus-within:ring-2 focus-within:ring-blue-500">
            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1110 2.5a7.5 7.5 0 016.65 14.15z"/>
            </svg>
            <input type="text"
                   x-model="query"
                   @input="show = query.length > 0"
                   @focus="if (query.length > 0) show = true"
                   @keydown.arrow-down.prevent="onArrowDown()"
                   @keydown.arrow-up.prevent="onArrowUp()"
                   @keydown.enter.prevent="onEnter()"
                   placeholder="Type the goal / exam you’re preparing for"
                   class="w-full text-sm text-gray-800 placeholder-gray-400 outline-none bg-transparent"
            />
        </div>

        <!-- Dropdown -->
        <div x-show="show" x-cloak x-transition
             @mouseenter="hovering = true" @mouseleave="hovering = false"
             class="absolute z-20 mt-2 w-full bg-white border border-gray-200 shadow-xl rounded-lg overflow-hidden">

            <div class="px-4 py-2 text-sm font-semibold text-gray-500 border-b">Popular goals</div>

            <template x-if="filtered.length > 0">
                <div>
                    <template x-for="(goal, index) in filtered" :key="goal.name">
                        <a href="#"
                           @click.prevent="onSelect(goal.name)"
                           :class="{
                  'bg-gray-100': index === activeIndex,
                  'hover:bg-gray-100': index !== activeIndex
               }"
                           class="flex items-center justify-between px-4 py-3 text-sm text-gray-800 cursor-pointer"
                        >
                            <div class="flex items-center space-x-3">
                                <span class="text-xl" x-text="goal.icon"></span>
                                <span x-text="goal.name"></span>
                            </div>
                            <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </template>
                </div>
            </template>

            <template x-if="filtered.length === 0">
                <div class="px-4 py-3 text-sm text-gray-500">No results found</div>
            </template>
        </div>
    </div>
</div>



<div class="max-w-6xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">Popular goals</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">

        <!-- Card -->
        <div class="p-6 bg-white border rounded-lg hover:shadow-lg transition">
            <div class="flex justify-center mb-4">
                <img src="https://img.icons8.com/ios/100/capitol.png" alt="UPSC" class="h-10">
            </div>
            <p class="text-center font-semibold">UPSC CSE - GS</p>
        </div>

        <div class="p-6 bg-white border rounded-lg hover:shadow-lg transition">
            <div class="flex justify-center mb-4">
                <img src="https://img.icons8.com/ios/100/lab-items.png" alt="IIT JEE" class="h-10">
            </div>
            <p class="text-center font-semibold">IIT JEE</p>
        </div>

        <div class="p-6 bg-white border rounded-lg hover:shadow-lg transition">
            <div class="flex justify-center mb-4">
                <img src="https://img.icons8.com/ios/100/caduceus.png" alt="NEET UG" class="h-10">
            </div>
            <p class="text-center font-semibold">NEET UG</p>
        </div>

        <div class="p-6 bg-white border rounded-lg hover:shadow-lg transition">
            <div class="flex justify-center mb-4">
                <img src="https://img.icons8.com/ios/100/money.png" alt="Bank Exams" class="h-10">
            </div>
            <p class="text-center font-semibold">Bank exams</p>
        </div>

        <div class="p-6 bg-white border rounded-lg hover:shadow-lg transition">
            <div class="flex justify-center mb-4">
                <img src="https://img.icons8.com/ios/100/task.png" alt="SSC JE" class="h-10">
            </div>
            <p class="text-center font-semibold">SSC JE & state AE exams</p>
        </div>

        <div class="p-6 bg-white border rounded-lg hover:shadow-lg transition">
            <div class="flex justify-center mb-4">
                <img src="https://img.icons8.com/ios/100/certificate.png" alt="CAT" class="h-10">
            </div>
            <p class="text-center font-semibold">CAT & other MBA entrance tests</p>
        </div>

        <div class="p-6 bg-white border rounded-lg hover:shadow-lg transition">
            <div class="flex justify-center mb-4">
                <img src="https://img.icons8.com/ios/100/open-book--v1.png" alt="CBSE Class 12" class="h-10">
            </div>
            <p class="text-center font-semibold">CBSE class 12</p>
        </div>

        <div class="p-6 bg-white border rounded-lg hover:shadow-lg transition">
            <div class="flex justify-center mb-4">
                <img src="https://img.icons8.com/ios/100/calculator--v1.png" alt="CA Intermediate" class="h-10">
            </div>
            <p class="text-center font-semibold">CA Intermediate</p>
        </div>

    </div>
</div>
<div class="max-w-6xl mx-auto px-5 pb-5">
    <button
        class="px-5 py-2 rounded-lg border border-gray-400 text-gray-800 font-semibold hover:bg-gray-100 transition"
        x-data
        @click="alert('Redirect to full goals list')"
    >
        See all goals (200+)
    </button>
</div>
