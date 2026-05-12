<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CouponPivotIncludeRoomType extends Model
{
    use HasFactory;

    protected $table = 'coupon_pivot_include_room_type';

    protected $fillable = [
        'coupon_id',
        'room_type_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'coupon_id' => 'integer',
        'room_type_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function coupon(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\CouponMaster::class);
    }

    public function roomType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\RoomType::class);
    }
}