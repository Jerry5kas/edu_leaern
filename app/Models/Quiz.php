<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Quiz extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid', 'lesson_id', 'title', 'description', 'time_limit_minutes',
        'passing_score', 'is_published', 'allow_retakes'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'allow_retakes' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($quiz) {
            if (empty($quiz->uuid)) {
                $quiz->uuid = Str::uuid();
            }
        });
    }

    // Belongs to a lesson
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    // Has many questions (future implementation)
    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }


}

