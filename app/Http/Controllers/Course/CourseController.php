<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseTag;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of published courses
     */
    public function index(Request $request)
    {
        $query = Course::where('is_published', true)
            ->with(['categories', 'tags', 'creator', 'sections.lessons']);

        // Filter by category
        if ($request->has('category') && $request->category) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter by tag
        if ($request->has('tag') && $request->tag) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('slug', $request->tag);
            });
        }

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('subtitle', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by level
        if ($request->has('level') && $request->level) {
            $query->where('level', $request->level);
        }

        // Filter by language
        if ($request->has('language') && $request->language) {
            $query->where('language', $request->language);
        }

        // Sort courses
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'price_low':
                $query->orderBy('price_cents', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price_cents', 'desc');
                break;
            case 'title':
                $query->orderBy('title', 'asc');
                break;
            default:
                $query->orderBy('published_at', 'desc');
        }

        $courses = $query->paginate(12);

        // Get categories and tags for filtering
        $categories = CourseCategory::orderBy('name')->get();
        $tags = CourseTag::orderBy('name')->get();

        return view('courses.index', compact('courses', 'categories', 'tags'));
    }

    /**
     * Display the specified course with sections and lessons
     */
    public function show($slug)
    {
        $course = Course::where('slug', $slug)
            ->where('is_published', true)
            ->with([
                'categories',
                'tags', 
                'creator',
                'sections' => function ($query) {
                    $query->orderBy('sort_order');
                },
                'sections.lessons' => function ($query) {
                    $query->where('is_published', true)->orderBy('sort_order');
                }
            ])
            ->firstOrFail();

        // Get related courses
        $relatedCourses = Course::where('is_published', true)
            ->where('id', '!=', $course->id)
            ->whereHas('categories', function ($query) use ($course) {
                $query->whereIn('id', $course->categories->pluck('id'));
            })
            ->with(['categories', 'creator'])
            ->limit(4)
            ->get();

        return view('courses.show', compact('course', 'relatedCourses'));
    }
}
