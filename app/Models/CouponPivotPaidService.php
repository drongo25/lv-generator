<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CouponPivotPaidService extends Model
{
    use HasFactory;

    protected $table = 'coupon_pivot_paid_service';

    protected $fillable = [
        'coupon_id',
        'paid_service_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'coupon_id' => 'integer',
        'paid_service_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function coupon(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\CouponMaster::class);
    }

    public function paidService(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\PaidService::class);
    }
}