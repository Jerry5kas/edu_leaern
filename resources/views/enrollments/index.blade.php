<x-layouts.main>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">My Courses</h1>
            <p class="mt-2 text-gray-600">Continue learning from where you left off</p>
        </div>

        @if($enrollments->count() > 0)
            <!-- Course Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($enrollments as $enrollment)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <!-- Course Image -->
                        <div class="relative h-48 bg-gray-200">
                            @if($enrollment->course->thumbnail_path)
                                <img src="{{ asset('storage/' . $enrollment->course->thumbnail_path) }}" 
                                     alt="{{ $enrollment->course->title }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="h-16 w-16 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 0112 15a4 4 0 016.879 2.804M15 11a3 3 0 10-6 0 3 3 0 006 0z"/>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Progress Badge -->
                            <div class="absolute top-3 right-3">
                                <span class="bg-green-500 text-white text-xs px-2 py-1 rounded-full font-medium">
                                    Enrolled
                                </span>
                            </div>
                        </div>

                        <!-- Course Content -->
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-xs text-gray-500 uppercase font-semibold">{{ strtoupper($enrollment->course->language) }}</span>
                                <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded">{{ ucfirst($enrollment->course->level) }}</span>
                            </div>

                            <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                                {{ $enrollment->course->title }}
                            </h3>

                            @if($enrollment->course->subtitle)
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $enrollment->course->subtitle }}</p>
                            @endif

                            <!-- Course Stats -->
                            <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                <span>{{ $enrollment->course->sections->count() }} sections</span>
                                <span>{{ $enrollment->course->lessons->count() }} lessons</span>
                                <span>{{ $enrollment->activated_at->format('M j, Y') }}</span>
                            </div>

                            <!-- Progress Bar -->
                            <div class="mb-4">
                                <div class="flex items-center justify-between text-sm mb-1">
                                    <span class="text-gray-600">Progress</span>
                                    <span class="text-gray-900 font-medium">0%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: 0%"></div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex gap-2">
                                <a href="{{ route('enrollments.show', $enrollment->course->slug) }}" 
                                   class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-4 rounded-md font-medium transition">
                                    Continue Learning
                                </a>
                                <button class="p-2 text-gray-400 hover:text-gray-600 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Empty State for No Progress -->
            @if($enrollments->count() == 0)
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No courses started yet</h3>
                    <p class="mt-1 text-sm text-gray-500">Start learning by enrolling in a course.</p>
                    <div class="mt-6">
                        <a href="{{ route('courses.index') }}" 
                           class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                            Browse Courses
                        </a>
                    </div>
                </div>
            @endif

        @else
            <!-- No Enrollments -->
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No courses enrolled yet</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by enrolling in your first course.</p>
                <div class="mt-6">
                    <a href="{{ route('courses.index') }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        Browse Courses
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-layouts.main>
