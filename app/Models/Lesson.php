<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Lesson extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid', 'course_id', 'section_id', 'title', 'slug', 'description',
        'content_type', 'content', 'video_provider', 'video_ref', 'duration_seconds',
        'attachment_json', 'sort_order', 'is_published', 'is_preview'
    ];

    protected $casts = [
        'duration_seconds' => 'integer',
         'sort_order' => 'integer',
        'is_published' => 'boolean',
        'is_preview' => 'boolean',
        'attachment_json' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function ($lesson) {
            if (empty($lesson->uuid)) {
                $lesson->uuid = Str::uuid();
            }
        });
    }

    // Belongs to a course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Belongs to a section (optional)
    public function section()
    {
        return $this->belongsTo(CourseSection::class);
    }

    // Has many lesson views (progress tracking)
    public function Views()
    {
        return $this->hasMany(LessonView::class);
    }



    // Quiz relationship
    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }


}

