<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpecialPrice extends Model
{
    use HasFactory;

    protected $table = 'special_prices';

    protected $fillable = [
        'room_type_id',
        'title',
        'start_time',
        'end_time',
        'day_1',
        'day_1_amount',
        'day_2',
        'day_2_amount',
        'day_3',
        'day_3_amount',
        'day_4',
        'day_4_amount',
        'day_5',
        'day_5_amount',
        'day_6',
        'day_6_amount',
        'day_7',
        'day_7_amount',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'room_type_id' => 'integer',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'day_1_amount' => 'decimal:2',
        'day_2_amount' => 'decimal:2',
        'day_3_amount' => 'decimal:2',
        'day_4_amount' => 'decimal:2',
        'day_5_amount' => 'decimal:2',
        'day_6_amount' => 'decimal:2',
        'day_7_amount' => 'decimal:2',
        'status' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function roomType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\RoomType::class);
    }
}