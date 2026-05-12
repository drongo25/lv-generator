<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservationNight extends Model
{
    use HasFactory;

    protected $table = 'reservation_nights';

    protected $fillable = [
        'reservation_id',
        'room_id',
        'date',
        'check_in',
        'check_out',
        'price',
    ];

    protected $casts = [
        'id' => 'integer',
        'reservation_id' => 'integer',
        'room_id' => 'integer',
        'date' => 'date',
        'check_in' => 'datetime',
        'check_out' => 'datetime',
        'price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function reservation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Reservation::class);
    }

    public function room(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Room::class);
    }
}