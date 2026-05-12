<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaidService extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'paid_services';

    protected $fillable = [
        'title',
        'price_type',
        'price',
        'short_desc',
        'long_desc',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'price' => 'decimal:2',
        'status' => 'integer',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function reservationPaidServices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\ReservationPaidService::class, 'pad_service_id');
    }

    public function couponMasters(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\CouponMaster::class, 'coupon_pivot_paid_service', 'paid_service_id', 'coupon_id');
    }
}