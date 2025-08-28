<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'course_id',
        'unit_price_cents',
        'quantity',
        'line_total_cents',
        'meta'
    ];

    protected $casts = [
        'unit_price_cents' => 'integer',
        'quantity' => 'integer',
        'line_total_cents' => 'integer',
        'meta' => 'array'
    ];

    protected $attributes = [
        'quantity' => 1, // Courses always have quantity 1
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
