<div x-data="classData" class="">

    <div class="max-w-6xl mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Classes by Railway Exams subjects</h2>

        <!-- Subject Filter -->
        <div class="flex gap-4 mb-8">
            <template x-for="subject in subjects" :key="subject">
                <button
                    @click="selectedSubject = subject"
                    class="flex items-center gap-2 px-5 py-2 rounded-full border text-sm font-medium transition duration-200"
                    :class="selectedSubject === subject ? 'bg-blue-100 border-blue-500 text-blue-600' : 'bg-white border-gray-300 text-gray-700'"
                >
                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a8 8 0 100 16 8 8 0 000-16z"/>
                    </svg>
                    <span x-text="subject"></span>
                </button>
            </template>
        </div>

        <!-- Class Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <template x-for="(item, index) in filteredItems" :key="index">
                <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-md transition duration-300">
                    <div class="relative">
                        <img :src="item.image" alt="Thumbnail" class="w-full h-40 object-cover">
                        <div class="absolute bottom-3 right-3 bg-white rounded-full p-2 shadow">
                            <svg class="w-5 h-5 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6 4l10 6-10 6V4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex gap-2 text-xs mb-1 flex-wrap">
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded">Hindi</span>
                            <span :class="item.tagColor" class="font-semibold" x-text="item.tag"></span>
                        </div>
                        <p class="text-sm font-medium leading-snug" x-text="item.title"></p>
                        <p class="text-xs text-gray-500 mt-1" x-text="item.instructor"></p>
                    </div>
                </div>
            </template>
        </div>

        <!-- See More Button -->
        <div class="mt-8">
            <button
                class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-6 py-3 rounded-lg"
                x-text="`See more in ${selectedSubject}`"
            ></button>
        </div>
    </div>

    <script>
        const classData = {
            selectedSubject: 'General Awareness',
            subjects: ['General Awareness', 'General Science'],
            items: [
                {
                    subject: 'General Awareness',
                    image: 'https://placehold.co/400x225?text=1',
                    tag: 'RRB JE NON-TECH (COMMON TOPICS)',
                    tagColor: 'text-orange-600',
                    title: 'Discussion on Current Affairs of 2022 for RRB NTPC and Group D',
                    instructor: 'Vimlesh Yadav'
                },
                {
                    subject: 'General Awareness',
                    image: 'https://placehold.co/400x225?text=2',
                    tag: 'GENERAL AWARENESS',
                    tagColor: 'text-blue-600',
                    title: 'Discussion on Static GK through PYQs for RRB NTPC and Group D',
                    instructor: 'Vimlesh Yadav'
                },
                {
                    subject: 'General Awareness',
                    image: 'https://placehold.co/400x225?text=3',
                    tag: 'GENERAL AWARENESS',
                    tagColor: 'text-blue-600',
                    title: 'रेलवे के 200 PYQs एक क्लास में',
                    instructor: 'Rajat Kumar'
                },
                {
                    subject: 'General Awareness',
                    image: 'https://placehold.co/400x225?text=4',
                    tag: 'GENERAL AWARENESS',
                    tagColor: 'text-blue-600',
                    title: 'रेलवे के 200 PYQs एक क्लास में',
                    instructor: 'Rajat Kumar'
                },
                {
                    subject: 'General Science',
                    image: 'https://placehold.co/400x225?text=5',
                    tag: 'GENERAL SCIENCE',
                    tagColor: 'text-green-600',
                    title: 'Complete Biology for RRB Group D',
                    instructor: 'Ankita Sharma'
                },
                {
                    subject: 'General Science',
                    image: 'https://placehold.co/400x225?text=6',
                    tag: 'GENERAL SCIENCE',
                    tagColor: 'text-green-600',
                    title: 'Physics Questions from Previous RRB Exams',
                    instructor: 'Deepak Singh'
                }

            ],
            get filteredItems() {
                return this.items.filter(item => item.subject === this.selectedSubject);
            }
        }
    </script>
</div>
