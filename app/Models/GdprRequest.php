<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GdprRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'type',
        'status',
        'requested_at',
        'processed_at',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'requested_at' => 'datetime',
        'processed_at' => 'datetime',
    ];

    /**
     * Get the user that owns the GDPR request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
