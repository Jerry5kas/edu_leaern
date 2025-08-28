<x-layouts.main>
    <div class="min-h-screen flex flex-col sm:flex-row" x-data="{
        search: '{{ request('search') }}',
        selectedCategory: '{{ request('category') }}',
        selectedTag: '{{ request('tag') }}',
        selectedLevel: '{{ request('level') }}',
        selectedLanguage: '{{ request('language') }}',
        selectedSort: '{{ request('sort', 'latest') }}',
        sidebarOpen: false
    }">

        <!-- Mobile Overlay -->
        <div
            x-show="sidebarOpen"
            @click="sidebarOpen = false"
            class="fixed inset-0 bg-black bg-opacity-25 z-40 sm:hidden"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
        </div>

        <!-- Sidebar -->
        <aside class="fixed sm:relative top-0 left-0 w-full sm:w-64 h-full bg-white z-50 transform transition-transform duration-300 sm:translate-x-0"
               :class="{'-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen}">

        <!-- Mobile close button -->
            <div class="sm:hidden flex justify-end p-4">
                <button @click="sidebarOpen = false" class="text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <nav class="mt-12 bg-white flex flex-col gap-4 p-4">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 rounded hover:bg-gray-100 font-medium text-gray-700">
                    Dashboard
                </a>
                <a href="{{ route('courses.index') }}" class="flex items-center px-4 py-2 rounded hover:bg-gray-100 font-medium text-gray-700">
                    Courses
                </a>
            </nav>
        </aside>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-y-auto bg-gray-50 p-6">

            <!-- Header --><div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4 w-full">
                <!-- Title -->
                <div class="flex flex-col">
                    <h1 class="text-2xl sm:text-3xl font-bold">Browse Courses</h1>
                    <p class="text-gray-600 mt-1">{{ $courses->total() }} courses found</p>
                </div>

                <!-- Search Input -->
                <div class="w-full sm:w-auto flex">
                    <input type="text"
                           placeholder="Search courses..."
                           x-model="search"
                           @keyup.enter="window.location.href = '{{ route('courses.index') }}?search=' + search + '&category=' + selectedCategory + '&tag=' + selectedTag + '&level=' + selectedLevel + '&language=' + selectedLanguage + '&sort=' + selectedSort"
                           class="w-full sm:w-64 border rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                </div>
            </div>

            <!-- Search & Filters -->
            <div class="p-4 mb-10  mx-auto flex flex-wrap gap-4 items-center">

                <select x-model="selectedCategory"
                        @change="window.location.href = '{{ route('courses.index') }}?search=' + search + '&category=' + selectedCategory + '&tag=' + selectedTag + '&level=' + selectedLevel + '&language=' + selectedLanguage + '&sort=' + selectedSort"
                        class="border rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <select x-model="selectedTag"
                        @change="window.location.href = '{{ route('courses.index') }}?search=' + search + '&category=' + selectedCategory + '&tag=' + selectedTag + '&level=' + selectedLevel + '&language=' + selectedLanguage + '&sort=' + selectedSort"
                        class="border rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                    <option value="">All Tags</option>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->slug }}">{{ $tag->name }}</option>
                    @endforeach
                </select>

                <select x-model="selectedLevel"
                        @change="window.location.href = '{{ route('courses.index') }}?search=' + search + '&category=' + selectedCategory + '&tag=' + selectedTag + '&level=' + selectedLevel + '&language=' + selectedLanguage + '&sort=' + selectedSort"
                        class="border rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                    <option value="">All Levels</option>
                    <option value="beginner">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>

                <select x-model="selectedLanguage"
                        @change="window.location.href = '{{ route('courses.index') }}?search=' + search + '&category=' + selectedCategory + '&tag=' + selectedTag + '&level=' + selectedLevel + '&language=' + selectedLanguage + '&sort=' + selectedSort"
                        class="border rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                    <option value="">All Languages</option>
                    <option value="en">English</option>
                    <option value="hi">Hindi</option>
                    <option value="es">Spanish</option>
                    <option value="fr">French</option>
                    <option value="de">German</option>
                </select>

                <select x-model="selectedSort"
                        @change="window.location.href = '{{ route('courses.index') }}?search=' + search + '&category=' + selectedCategory + '&tag=' + selectedTag + '&level=' + selectedLevel + '&language=' + selectedLanguage + '&sort=' + selectedSort"
                        class="border rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                    <option value="latest">Latest</option>
                    <option value="oldest">Oldest</option>
                    <option value="price_low">Price: Low to High</option>
                    <option value="price_high">Price: High to Low</option>
                    <option value="title">Title A-Z</option>
                </select>

                <button @click="window.location.href = '{{ route('courses.index') }}'"
                        class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded text-sm font-medium">
                    Clear Filters
                </button>
            </div>

            <!-- Courses Listing -->
            @if($courses->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($courses as $course)
                        <div class="bg-white rounded-lg shadow p-4 relative transform transition hover:-translate-y-1 hover:shadow-lg duration-300">
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

                <div class="mt-8">
                    {{ $courses->appends(request()->query())->links() }}
                </div>
            @else
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
        </div>
    </div>
</x-layouts.main>
