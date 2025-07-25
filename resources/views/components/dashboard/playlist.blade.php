<div>
    <div
        class="px-4 max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 sm:gap-0 py-6">
        <div class="w-full sm:w-1/2 text-xl sm:text-2xl lg:text-3xl font-semibold">
            Get subscription to start your preparation<br class="sm:hidden"/>
            View subscription plans
        </div>
        <div class="w-full sm:w-auto">
            <button class="w-full sm:w-auto bg-[#08BD80] text-white px-4 py-3 rounded-xl font-semibold text-center">
                View Subscription Plans
            </button>
        </div>
    </div>


    <div class="px-4 max-w-6xl mx-auto space-y-3 py-6">
        <!-- Heading -->
        <div class="text-xl sm:text-2xl font-semibold">
            Crack Railway Exams with our full-syllabus batches
        </div>

        <!-- Features List -->
        <div class="text-sm text-gray-500 flex flex-col sm:flex-row sm:flex-wrap gap-y-3 sm:gap-x-6 font-semibold">
            <!-- Feature 1 -->
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <span>Best for full syllabus preparation</span>
            </div>

            <!-- Feature 2 -->
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <span>Live & recorded online classes</span>
            </div>

            <!-- Feature 3 -->
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <span>Curated by best educators</span>
            </div>
        </div>
    </div>



    <div class="max-w-6xl mx-auto px-4 py-10" x-data="batchSlider()">
        <!-- Navigation -->
        <div class="flex justify-between items-center mb-4">
            <div><h2 class="text-xl font-bold">Recommended batches for you</h2></div>
            <div class="flex items-center gap-2">
                <button @click="prev" :disabled="currentPage === 0"
                        class="p-2 rounded border hover:bg-gray-100 disabled:opacity-40">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button @click="next" :disabled="endIndex >= batches.length"
                        class="p-2 rounded border hover:bg-gray-100 disabled:opacity-40">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <template x-for="(batch, index) in paginated" :key="index">
                <div class="bg-white border rounded-xl shadow overflow-hidden">
                    <img :src="batch.thumbnail" alt="Thumbnail" class="w-full h-44 object-cover">
                    <div class="p-4">
                        <div class="flex gap-2 text-xs font-semibold mb-1">
                            <span class="bg-gray-100 px-2 py-1 rounded">Hindi</span>
                            <span class="text-blue-600" x-text="batch.label"></span>
                        </div>
                        <h4 class="font-bold text-base mb-2" x-text="batch.title"></h4>
                        <div class="text-sm text-gray-500 flex items-center mb-1">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 11v10a1 1 0 001 1h12a1 1 0 001-1V11H5z"/>
                            </svg>
                            <span x-text="batch.date"></span>
                        </div>
                        <div class="text-sm text-gray-500 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.8.75 6.879 2.036M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span x-text="batch.teachers"></span>
                        </div>
                    </div>
                </div>
            </template>
        </div>

    </div>

    <script>
        function batchSlider() {
            return {
                currentPage: 0,
                pageSize: 4,
                get startIndex() {
                    return this.currentPage * this.pageSize;
                },
                get endIndex() {
                    return this.startIndex + this.pageSize;
                },
                get paginated() {
                    return this.batches.slice(this.startIndex, this.endIndex);
                },
                next() {
                    if (this.endIndex < this.batches.length) this.currentPage++;
                },
                prev() {
                    if (this.currentPage > 0) this.currentPage--;
                },
                batches: [
                    {
                        thumbnail: 'https://placehold.co/300x180/DEF/fff?text=Batch+1',
                        label: 'PARTIAL SYLLABUS',
                        title: 'Adwitiya Batch for RRB Group D',
                        date: 'Ended on 20 May 2022',
                        teachers: 'Shashank, Priya +2'
                    },
                    {
                        thumbnail: 'https://placehold.co/300x180/ABC/fff?text=Batch+2',
                        label: 'PARTIAL SYLLABUS',
                        title: 'Target Batch for RRB ALP CBT I',
                        date: 'Ended on 1 May 2022',
                        teachers: 'Satyam, Vimlesh +2'
                    },
                    {
                        thumbnail: 'https://placehold.co/300x180/89C/fff?text=Batch+3',
                        label: 'PARTIAL SYLLABUS',
                        title: 'Target Batch for RRB ALP CBT I',
                        date: 'Ended on 1 May 2022',
                        teachers: 'Om, Satyam, Vimlesh'
                    },
                    {
                        thumbnail: 'https://placehold.co/300x180/567/fff?text=Batch+4',
                        label: 'PARTIAL SYLLABUS',
                        title: 'Target Batch for RRB ALP CBT I',
                        date: 'Ended on 1 May 2022',
                        teachers: 'Satyam, Anuradha +3'
                    },
                    {
                        thumbnail: 'https://placehold.co/300x180/333/fff?text=Batch+5',
                        label: 'FULL SYLLABUS',
                        title: 'Batch for NTPC Group D',
                        date: 'Ended on 2 May 2022',
                        teachers: 'Ajay, Priya +3'
                    },
                    {
                        thumbnail: 'https://placehold.co/300x180/234/fff?text=Batch+6',
                        label: 'FULL SYLLABUS',
                        title: 'Special Current Affairs Batch',
                        date: 'Ended on 10 May 2022',
                        teachers: 'Rajesh, Vimlesh +1'
                    }
                ]
            };
        }
    </script>
</div>
