<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CouponMaster extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'coupon_masters';

    protected $fillable = [
        'offer_title',
        'description',
        'image',
        'period_start_time',
        'period_end_time',
        'code',
        'type',
        'value',
        'min_amount',
        'max_amount',
        'limit_per_user',
        'limit_per_coupon',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'period_start_time' => 'datetime',
        'period_end_time' => 'datetime',
        'value' => 'decimal:2',
        'min_amount' => 'decimal:2',
        'max_amount' => 'decimal:2',
        'limit_per_user' => 'integer',
        'limit_per_coupon' => 'integer',
        'status' => 'integer',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function appliedCouponCodes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\AppliedCouponCode::class, 'coupon_id');
    }

    public function roomTypes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\RoomType::class, 'coupon_pivot_include_room_type', 'coupon_id', 'room_type_id');
    }

    public function paidServices(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\PaidService::class, 'coupon_pivot_paid_service', 'coupon_id', 'paid_service_id');
    }
}