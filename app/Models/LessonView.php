<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonView extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'lesson_id', 'seconds_watched',
        'completed_at', 'last_position_seconds'
    ];

    protected $casts = [
        'seconds_watched' => 'integer',
        'last_position_seconds' => 'integer',
        'completed_at' => 'datetime'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
