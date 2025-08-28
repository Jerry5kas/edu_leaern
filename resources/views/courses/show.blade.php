<x-layouts.main>
    <div x-data="{ open: false }" class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-xl space-y-6 py-5">

        <!-- Breadcrumb Navigation -->
        <div class="flex flex-wrap items-center gap-2 text-sm text-gray-600">
            <a href="{{ route('courses.index') }}" class="hover:underline">&larr; Back to Courses</a>
            <span>/</span>
            @if($course->categories->count() > 0)
                <span class="px-3 py-1 border rounded-full">{{ $course->categories->first()->name }}</span>
                <span>/</span>
            @endif
            <span class="font-medium">{{ $course->title }}</span>
        </div>

        <!-- Course Header -->
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Course Preview -->
            <div class="relative w-full lg:w-1/3 rounded-lg overflow-hidden bg-blue-100">
                <!-- Thumbnail -->
                <div @click="open = true" class="cursor-pointer relative">
                    @if($course->thumbnail_path)
                        <img src="{{ asset('storage/' . $course->thumbnail_path) }}" 
                             alt="{{ $course->title }}" 
                             class="w-full object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <svg class="h-16 w-16 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 0112 15a4 4 0 016.879 2.804M15 11a3 3 0 10-6 0 3 3 0 006 0z"/>
                            </svg>
                        </div>
                    @endif
                    
                    <!-- Play Button -->
                    <button class="absolute bottom-4 left-4 bg-white bg-opacity-80 px-3 py-1 rounded-full flex items-center gap-2 text-sm font-semibold">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14.752 11.168l-4.596-2.65A1 1 0 009 9.26v5.48a1 1 0 001.156.987l4.596-2.65a1 1 0 000-1.74z"/>
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
                        <!-- Video -->
                        <div class="aspect-w-16 aspect-h-9 w-full">
                            @if($course->trailer_url)
                                <iframe class="w-full h-64 sm:h-96 rounded-lg"
                                        src="{{ $course->trailer_url }}"
                                        title="Course Preview" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                            @else
                                <div class="w-full h-64 sm:h-96 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <p class="text-gray-500">No preview video available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Course Info -->
            <div class="flex-1">
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-gray-200 text-xs px-2 py-1 rounded font-semibold">{{ strtoupper($course->language) }}</span>
                    <span class="bg-blue-100 text-blue-600 text-xs px-2 py-1 rounded font-semibold">{{ ucfirst($course->level) }}</span>
                    @foreach($course->tags as $tag)
                        <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded font-semibold">{{ $tag->name }}</span>
                    @endforeach
                </div>
                
                <h1 class="text-2xl font-bold leading-snug">{{ $course->title }}</h1>
                
                @if($course->subtitle)
                    <p class="text-gray-600 font-medium mt-1">{{ $course->subtitle }}</p>
                @endif
                
                <p class="text-gray-700 font-medium mt-1">
                    {{ $course->creator ? $course->creator->name : 'Unknown Instructor' }}
                </p>
                
                <p class="text-gray-500 mt-3 text-sm leading-relaxed">
                    {{ Str::limit($course->description, 200) }}
                    @if(strlen($course->description) > 200)
                        <span class="text-teal-600 font-medium cursor-pointer hover:underline">Read more</span>
                    @endif
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
                    <p class="font-semibold">Published {{ $course->published_at ? $course->published_at->format('M j') : 'Recently' }}</p>
                    <p class="text-gray-500 text-xs">{{ $course->created_at->format('M j, Y') }}</p>
                </div>
            </div>
            
            <div class="flex items-start gap-3">
                <div class="bg-gray-100 p-2 rounded-lg">
                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 10l4.553 2.276A1 1 0 0120 13.118V18a1 1 0 01-1 1h-6a1 1 0 01-1-1v-2.118a1 1 0 01.447-.842L15 10z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold">{{ $course->sections->count() }} sections</p>
                    <p class="text-gray-500 text-xs">{{ $course->lessons->count() }} lessons</p>
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
                    <p class="font-semibold">{{ $course->lessons->where('is_preview', true)->count() }} preview lessons</p>
                    <p class="text-gray-500 text-xs">Free preview available</p>
                </div>
            </div>
            
            <div class="flex gap-2 items-center">
                @if($course->price_cents > 0)
                    <button class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded font-semibold w-full">
                        €{{ number_format($course->price_cents / 100, 2) }}
                    </button>
                @else
                    <button class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded font-semibold w-full">
                        Free
                    </button>
                @endif
                <button class="p-2 border rounded hover:bg-gray-100">
                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="1.5"
                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 12v-1a9 9 0 019-9h1m0 0a9 9 0 019 9v1m-2-2h-3m3 0l-4 4m0 0l-4-4"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Course Content -->
    <div class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8 space-y-12">
        @if($course->sections->count() > 0)
            @foreach($course->sections as $section)
                <div class="bg-gray-50 p-5 rounded-xl">
                    <div class="flex flex-col lg:flex-row gap-6 lg:items-start">

                        <!-- Section Header -->
                        <div class="lg:w-1/3">
                            <h2 class="text-2xl font-bold text-gray-800">{{ $section->title }}</h2>
                            <p class="text-sm text-slate-500 mt-1">{{ $section->lessons->count() }} lessons</p>
                            @if($section->total_duration)
                                <p class="text-sm text-slate-500">{{ $section->total_duration }}</p>
                            @endif
                        </div>

                        <!-- Lessons List -->
                        <div class="flex-1 space-y-4">
                            @foreach($section->lessons as $lesson)
                                <div class="flex items-start justify-between bg-white shadow rounded-lg p-4 sm:p-6 cursor-pointer hover:bg-gray-50 transition">
                                    <!-- Lesson Info -->
                                    <div class="flex items-start">
                                        <!-- Lesson Number -->
                                        <div class="w-16 shrink-0 text-center">
                                            <p class="text-xs text-gray-500 font-medium">LESSON</p>
                                            <p class="text-lg font-bold text-gray-700">{{ $loop->iteration }}</p>
                                        </div>

                                        <!-- Lesson Details -->
                                        <div class="ml-4">
                                            <h3 class="text-base font-semibold text-gray-800">{{ $lesson->title }}</h3>
                                            <p class="text-sm text-gray-500 mt-1">
                                                Lesson {{ $loop->iteration }} • 
                                                @if($lesson->duration_seconds)
                                                    {{ gmdate('H:i:s', $lesson->duration_seconds) }}
                                                @else
                                                    No duration
                                                @endif
                                            </p>
                                            @if($lesson->is_preview)
                                                <span class="inline-block bg-green-100 text-green-600 text-xs px-2 py-1 rounded mt-1">Free Preview</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Lock Icon or Play Button -->
                                    <div class="flex items-center">
                                        @if($lesson->is_preview)
                                            <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor"
                                                 stroke-width="1.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M14.752 11.168l-4.596-2.65A1 1 0 009 9.26v5.48a1 1 0 001.156.987l4.596-2.65a1 1 0 000-1.74z"/>
                                            </svg>
                                        @else
                                            <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor"
                                                 stroke-width="1.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75M6.75 10.5h10.5A2.25 2.25 0 0 1 19.5 12.75v6.75a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5v-6.75A2.25 2.25 0 0 1 6.75 10.5Z"/>
                                            </svg>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No content available</h3>
                <p class="mt-1 text-sm text-gray-500">This course doesn't have any sections or lessons yet.</p>
            </div>
        @endif
    </div>

    <!-- Related Courses -->
    @if($relatedCourses->count() > 0)
        <div class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Related Courses</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedCourses as $relatedCourse)
                    <div class="bg-white rounded-lg shadow p-4 relative transform transition hover:-translate-y-1 hover:shadow-lg duration-300">
                        <a href="{{ route('courses.show', $relatedCourse->slug) }}">
                            <div class="bg-blue-100 h-32 flex items-center justify-center rounded mb-4 relative">
                                @if($relatedCourse->thumbnail_path)
                                    <img src="{{ asset('storage/' . $relatedCourse->thumbnail_path) }}" 
                                         alt="{{ $relatedCourse->title }}" 
                                         class="w-full h-full object-cover rounded">
                                @else
                                    <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                         stroke-width="1.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5.121 17.804A4 4 0 0112 15a4 4 0 016.879 2.804M15 11a3 3 0 10-6 0 3 3 0 006 0z"/>
                                    </svg>
                                @endif
                            </div>

                            <div class="space-y-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-xs text-gray-500 uppercase font-semibold">{{ strtoupper($relatedCourse->language) }}</span>
                                    @if($relatedCourse->categories->count() > 0)
                                        <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded">{{ $relatedCourse->categories->first()->name }}</span>
                                    @endif
                                </div>
                                
                                <h3 class="font-bold text-lg line-clamp-2">{{ $relatedCourse->title }}</h3>
                                
                                <p class="font-medium text-sm text-gray-700">
                                    {{ $relatedCourse->creator ? $relatedCourse->creator->name : 'Unknown Instructor' }}
                                </p>
                                
                                @if($relatedCourse->price_cents > 0)
                                    <p class="font-bold text-lg text-green-600">
                                        €{{ number_format($relatedCourse->price_cents / 100, 2) }}
                                    </p>
                                @else
                                    <p class="font-bold text-lg text-green-600">Free</p>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</x-layouts.main>
