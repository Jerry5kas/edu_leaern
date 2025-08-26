<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunicationPreference extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'email_course_updates',
        'email_promotions',
        'sms_otp',
        'sms_marketing',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_course_updates' => 'boolean',
        'email_promotions' => 'boolean',
        'sms_otp' => 'boolean',
        'sms_marketing' => 'boolean',
    ];

    /**
     * Get the user that owns the communication preferences.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
