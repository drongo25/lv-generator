<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppliedCouponCode extends Model
{
    use HasFactory;

    protected $table = 'applied_coupon_codes';

    protected $fillable = [
        'reservation_id',
        'coupon_id',
        'user_id',
        'date',
        'status',
        'coupon_type',
        'coupon_rate',
    ];

    protected $casts = [
        'id' => 'integer',
        'reservation_id' => 'integer',
        'coupon_id' => 'integer',
        'user_id' => 'integer',
        'date' => 'date',
        'status' => 'integer',
        'coupon_rate' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function coupon(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\CouponMaster::class);
    }

    public function reservation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Reservation::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}