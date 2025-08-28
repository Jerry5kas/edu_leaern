<x-layouts.main>
    <div class="min-h-screen flex flex-col sm:flex-row" x-data="{ 
        active: 'browse', 
        search: '{{ request('search') }}', 
        menuOpen: false,
        selectedCategory: '{{ request('category') }}',
        selectedTag: '{{ request('tag') }}',
        selectedLevel: '{{ request('level') }}',
        selectedLanguage: '{{ request('language') }}',
        selectedSort: '{{ request('sort', 'latest') }}'
    }">
        <!-- Mobile Menu Toggle -->
        <div class="sm:hidden bg-white shadow px-4 py-3 flex justify-between items-center">
            <h2 class="text-xl font-bold">SELF STUDY</h2>
            <button @click="menuOpen = !menuOpen" class="text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75"/>
                </svg>
            </button>
        </div>

        <!-- Sidebar -->
        <aside
            :class="{'block': menuOpen, 'hidden': !menuOpen}"
            class="sm:block sm:w-64 w-full bg-white shadow-md p-6 space-y-4 sm:h-screen sm:overflow-y-auto"
        >
            <h2 class="sm:block hidden text-xl font-bold mb-4">SELF STUDY</h2>
            
            <!-- Search -->
            <div class="space-y-2">
                <label class="text-sm font-semibold text-gray-700">Search</label>
                <input type="text"
                       placeholder="Search courses..."
                       x-model="search"
                       @keyup.enter="window.location.href = '{{ route('courses.index') }}?search=' + search + '&category=' + selectedCategory + '&tag=' + selectedTag + '&level=' + selectedLevel + '&language=' + selectedLanguage + '&sort=' + selectedSort"
                       class="w-full border rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
            </div>

            <!-- Categories Filter -->
            <div class="space-y-2">
                <label class="text-sm font-semibold text-gray-700">Categories</label>
                <select x-model="selectedCategory" 
                        @change="window.location.href = '{{ route('courses.index') }}?search=' + search + '&category=' + selectedCategory + '&tag=' + selectedTag + '&level=' + selectedLevel + '&language=' + selectedLanguage + '&sort=' + selectedSort"
                        class="w-full border rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tags Filter -->
            <div class="space-y-2">
                <label class="text-sm font-semibold text-gray-700">Tags</label>
                <select x-model="selectedTag"
                        @change="window.location.href = '{{ route('courses.index') }}?search=' + search + '&category=' + selectedCategory + '&tag=' + selectedTag + '&level=' + selectedLevel + '&language=' + selectedLanguage + '&sort=' + selectedSort"
                        class="w-full border rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                    <option value="">All Tags</option>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->slug }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Level Filter -->
            <div class="space-y-2">
                <label class="text-sm font-semibold text-gray-700">Level</label>
                <select x-model="selectedLevel"
                        @change="window.location.href = '{{ route('courses.index') }}?search=' + search + '&category=' + selectedCategory + '&tag=' + selectedTag + '&level=' + selectedLevel + '&language=' + selectedLanguage + '&sort=' + selectedSort"
                        class="w-full border rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                    <option value="">All Levels</option>
                    <option value="beginner">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
            </div>

            <!-- Language Filter -->
            <div class="space-y-2">
                <label class="text-sm font-semibold text-gray-700">Language</label>
                <select x-model="selectedLanguage"
                        @change="window.location.href = '{{ route('courses.index') }}?search=' + search + '&category=' + selectedCategory + '&tag=' + selectedTag + '&level=' + selectedLevel + '&language=' + selectedLanguage + '&sort=' + selectedSort"
                        class="w-full border rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                    <option value="">All Languages</option>
                    <option value="en">English</option>
                    <option value="hi">Hindi</option>
                    <option value="es">Spanish</option>
                    <option value="fr">French</option>
                    <option value="de">German</option>
                </select>
            </div>

            <!-- Sort Options -->
            <div class="space-y-2">
                <label class="text-sm font-semibold text-gray-700">Sort By</label>
                <select x-model="selectedSort"
                        @change="window.location.href = '{{ route('courses.index') }}?search=' + search + '&category=' + selectedCategory + '&tag=' + selectedTag + '&level=' + selectedLevel + '&language=' + selectedLanguage + '&sort=' + selectedSort"
                        class="w-full border rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                    <option value="latest">Latest</option>
                    <option value="oldest">Oldest</option>
                    <option value="price_low">Price: Low to High</option>
                    <option value="price_high">Price: High to Low</option>
                    <option value="title">Title A-Z</option>
                </select>
            </div>

            <!-- Clear Filters -->
            <button @click="window.location.href = '{{ route('courses.index') }}'"
                    class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded text-sm font-medium transition">
                Clear Filters
            </button>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto h-screen bg-gray-50 p-6">
            <div class="flex justify-between items-center mb-6 flex-wrap gap-4">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold">Browse Courses</h1>
                    <p class="text-gray-600 mt-1">{{ $courses->total() }} courses found</p>
                </div>
            </div>

            @if($courses->count() > 0)
                <!-- Grid Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($courses as $course)
                        <div class="bg-white rounded-lg shadow p-4 relative transform transition hover:-translate-y-1 hover:shadow-lg duration-300">
                            <!-- Image/Icon Area -->
                            <a href="{{ route('courses.show', $course->slug) }}">
                                <div class="bg-blue-100 h-32 flex items-center justify-center rounded mb-4 relative">
                                    @if($course->thumbnail_path)
                                        <img src="{{ asset('storage/' . $course->thumbnail_path) }}" 
                                             alt="{{ $course->title }}" 
                                             class="w-full h-full object-cover rounded">
                                    @else
                                        <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                             stroke-width="1.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5.121 17.804A4 4 0 0112 15a4 4 0 016.879 2.804M15 11a3 3 0 10-6 0 3 3 0 006 0z"/>
                                        </svg>
                                    @endif
                                    
                                    @if($course->price_cents > 0)
                                        <div class="absolute top-2 right-2 bg-white rounded-full p-1 shadow">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <!-- Text Content -->
                                <div class="space-y-2">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs text-gray-500 uppercase font-semibold">{{ strtoupper($course->language) }}</span>
                                        @if($course->categories->count() > 0)
                                            <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded">{{ $course->categories->first()->name }}</span>
                                        @endif
                                    </div>
                                    
                                    <h2 class="font-bold text-lg line-clamp-2">{{ $course->title }}</h2>
                                    
                                    @if($course->subtitle)
                                        <p class="text-gray-600 text-sm line-clamp-2">{{ $course->subtitle }}</p>
                                    @endif
                                    
                                    <div class="flex items-center justify-between text-sm text-gray-500">
                                        <span>{{ $course->sections->count() }} sections</span>
                                        <span>{{ $course->lessons->count() }} lessons</span>
                                    </div>
                                    
                                    <p class="font-medium text-sm text-gray-700">
                                        {{ $course->creator ? $course->creator->name : 'Unknown Instructor' }}
                                    </p>
                                    
                                    @if($course->price_cents > 0)
                                        <p class="font-bold text-lg text-green-600">
                                            €{{ number_format($course->price_cents / 100, 2) }}
                                        </p>
                                    @else
                                        <p class="font-bold text-lg text-green-600">Free</p>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $courses->appends(request()->query())->links() }}
                </div>
            @else
                <!-- No courses found -->
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No courses found</h3>
                    <p class="mt-1 text-sm text-gray-500">Try adjusting your search or filter criteria.</p>
                    <div class="mt-6">
                        <button @click="window.location.href = '{{ route('courses.index') }}'"
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700">
                            Clear all filters
                        </button>
                    </div>
                </div>
            @endif
        </main>
    </div>
</x-layouts.main>
