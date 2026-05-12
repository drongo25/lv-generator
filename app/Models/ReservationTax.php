<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservationTax extends Model
{
    use HasFactory;

    protected $table = 'reservation_taxes';

    protected $fillable = [
        'reservation_id',
        'tax_id',
        'type',
        'value',
        'price',
    ];

    protected $casts = [
        'id' => 'integer',
        'reservation_id' => 'integer',
        'tax_id' => 'integer',
        'value' => 'decimal:2',
        'price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function reservation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Reservation::class);
    }

    public function tax(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\TaxManager::class);
    }
}