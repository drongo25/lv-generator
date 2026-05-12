<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservationPaidService extends Model
{
    use HasFactory;

    protected $table = 'reservation_paid_services';

    protected $fillable = [
        'reservation_id',
        'pad_service_id',
        'price_type',
        'value',
        'price',
    ];

    protected $casts = [
        'id' => 'integer',
        'reservation_id' => 'integer',
        'pad_service_id' => 'integer',
        'value' => 'decimal:2',
        'price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function padService(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\PaidService::class);
    }

    public function reservation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Reservation::class);
    }
}