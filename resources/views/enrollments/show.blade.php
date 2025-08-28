<x-layouts.main>
    <div class="flex h-screen bg-gray-100" x-data="{ 
        selectedLesson: null,
        sidebarOpen: true,
        currentTime: 0,
        duration: 0,
        isPlaying: false
    }">
        <!-- Sidebar -->
        <div class="w-80 bg-white shadow-lg flex flex-col" :class="{ 'hidden': !sidebarOpen }">
            <!-- Course Header -->
            <div class="p-4 border-b">
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-lg font-semibold text-gray-900 line-clamp-2">{{ $enrollment->course->title }}</h1>
                    <button @click="sidebarOpen = false" class="lg:hidden text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <p class="text-sm text-gray-600">{{ $enrollment->course->sections->count() }} sections • {{ $enrollment->course->lessons->count() }} lessons</p>
            </div>

            <!-- Sections List -->
            <div class="flex-1 overflow-y-auto">
                @foreach($enrollment->course->sections as $section)
                    <div class="border-b border-gray-200">
                        <div class="p-4">
                            <h3 class="font-medium text-gray-900 mb-2">{{ $section->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $section->lessons->count() }} lessons</p>
                        </div>
                        
                        <!-- Lessons in Section -->
                        <div class="pb-2">
                            @foreach($section->lessons as $lesson)
                                <div class="px-4 py-2 hover:bg-gray-50 cursor-pointer transition"
                                     :class="{ 'bg-blue-50 border-r-2 border-blue-500': selectedLesson && selectedLesson.id === {{ $lesson->id }} }"
                                     @click="selectedLesson = {
                                         id: {{ $lesson->id }},
                                         title: '{{ $lesson->title }}',
                                         content_type: '{{ $lesson->content_type }}',
                                         video_ref: '{{ $lesson->video_ref }}',
                                         duration_seconds: {{ $lesson->duration_seconds ?? 0 }},
                                         description: '{{ $lesson->description ?? '' }}'
                                     }">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-xs text-gray-600">
                                                {{ $loop->iteration }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900 line-clamp-1">{{ $lesson->title }}</p>
                                                <p class="text-xs text-gray-500">
                                                    @if($lesson->duration_seconds)
                                                        {{ gmdate('H:i:s', $lesson->duration_seconds) }}
                                                    @else
                                                        No duration
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            @if($lesson->is_preview)
                                                <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded">Preview</span>
                                            @endif
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-4.596-2.65A1 1 0 009 9.26v5.48a1 1 0 001.156.987l4.596-2.65a1 1 0 000-1.74z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <div class="bg-white shadow-sm border-b px-4 py-3 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <button @click="sidebarOpen = true" class="lg:hidden text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900" x-text="selectedLesson ? selectedLesson.title : 'Select a lesson to start learning'"></h2>
                        <p class="text-sm text-gray-600" x-text="selectedLesson ? 'Lesson ' + selectedLesson.id : ''"></p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="{{ route('enrollments.index') }}" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </a>
                    <button class="text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Lesson Content -->
            <div class="flex-1 flex flex-col">
                <!-- Video Player Area -->
                <div class="flex-1 bg-black relative">
                    <template x-if="selectedLesson">
                        <div class="w-full h-full flex items-center justify-center">
                            <template x-if="selectedLesson.content_type === 'video' && selectedLesson.video_ref">
                                <div class="w-full h-full">
                                    <iframe 
                                        class="w-full h-full"
                                        :src="selectedLesson.video_ref"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            </template>
                            <template x-if="selectedLesson.content_type !== 'video' || !selectedLesson.video_ref">
                                <div class="text-center text-white">
                                    <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <h3 class="text-lg font-medium mb-2" x-text="selectedLesson.title"></h3>
                                    <p class="text-gray-300" x-text="selectedLesson.description || 'No content available for this lesson.'"></p>
                                </div>
                            </template>
                        </div>
                    </template>
                    
                    <!-- No Lesson Selected -->
                    <template x-if="!selectedLesson">
                        <div class="w-full h-full flex items-center justify-center">
                            <div class="text-center text-white">
                                <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-4.596-2.65A1 1 0 009 9.26v5.48a1 1 0 001.156.987l4.596-2.65a1 1 0 000-1.74z"/>
                                </svg>
                                <h3 class="text-lg font-medium mb-2">Select a lesson to start learning</h3>
                                <p class="text-gray-300">Choose a lesson from the sidebar to begin your learning journey.</p>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Lesson Info Panel -->
                <div class="bg-white border-t" x-show="selectedLesson">
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900" x-text="selectedLesson ? selectedLesson.title : ''"></h3>
                            <div class="flex items-center space-x-4">
                                <button class="text-gray-400 hover:text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </button>
                                <button class="text-gray-400 hover:text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-6 text-sm text-gray-600">
                            <span x-text="selectedLesson ? 'Duration: ' + (selectedLesson.duration_seconds ? Math.floor(selectedLesson.duration_seconds / 60) + ' min' : 'Not specified') : ''"></span>
                            <span x-text="selectedLesson ? 'Type: ' + selectedLesson.content_type : ''"></span>
                        </div>
                        
                        <div class="mt-4" x-show="selectedLesson && selectedLesson.description">
                            <h4 class="font-medium text-gray-900 mb-2">Description</h4>
                            <p class="text-gray-600 text-sm" x-text="selectedLesson ? selectedLesson.description : ''"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
