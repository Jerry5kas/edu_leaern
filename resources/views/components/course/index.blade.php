<div class="px-4 max-w-7xl mx-auto py-6" x-data="courseList">
    <h2 class="text-2xl font-bold mb-4">Popular courses</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <!-- Course Card -->
        <template x-for="course in courses" :key="course.id">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <!-- Thumbnail -->
                <div class="relative bg-blue-100 p-6">
                    <img :src="course.thumbnail" alt="Thumbnail" class="mx-auto w-20 h-20 object-contain">
                    <!-- Lock icon -->
                    <div class="absolute top-3 right-3 bg-white p-1 rounded-full shadow">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16 12v-2a4 4 0 00-8 0v2M5 12h14v7H5z"/>
                        </svg>
                    </div>
                </div>

                <!-- Course Info -->
                <div class="p-4 space-y-2 text-sm">
                    <div class="flex gap-2 text-xs font-semibold flex-wrap">
                        <span class="bg-gray-100 text-gray-700 px-2 py-0.5 rounded">ENGLISH</span>
                        <span class="text-blue-600" x-text="course.subject"></span>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-base" x-text="course.title"></h3>
                    <p class="text-gray-500 text-xs" x-text="course.info"></p>
                    <p class="text-gray-700 font-medium" x-text="course.instructor"></p>
                </div>
            </div>
        </template>
    </div>
</div>

<!-- Alpine Data -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('courseList', () => ({
            courses: [
                {
                    id: 1,
                    subject: 'GENERAL SCIENCE',
                    title: 'Complete Course on Science for Railways Group D',
                    info: 'Ended on Dec 7, 2019 • 40 lessons',
                    instructor: 'Wifistudy P',
                    thumbnail: 'https://via.placeholder.com/100x100/CAE5F6/FFFFFF?text=👤'
                },
                {
                    id: 2,
                    subject: 'RRB JE NON-TECH (COMMON)',
                    title: 'Practice Course on General Science through MCQs',
                    info: 'Ended on Sep 11, 2019 • 8 lessons',
                    instructor: 'Moinak Gorai',
                    thumbnail: 'https://via.placeholder.com/100x100/B6DAF7/FFFFFF?text=👥'
                },
                {
                    id: 3,
                    subject: 'MATHEMATICS',
                    title: 'Complete Course on Maths for NTPC',
                    info: 'Ended on Mar 5, 2020 • 48 lessons',
                    instructor: 'Wifistudy P',
                    thumbnail: 'https://via.placeholder.com/100x100/F8D7F9/FFFFFF?text=➕'
                },
                {
                    id: 4,
                    subject: 'GENERAL AWARENESS',
                    title: 'Crash Course on Current Affairs',
                    info: 'Ended on Jun 12, 2021 • 22 lessons',
                    instructor: 'Priya Chaudhary',
                    thumbnail: 'https://via.placeholder.com/100x100/DEF8E5/000000?text=📰'
                }
            ]
        }))
    })
</script>
