<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'room_types';

    protected $fillable = [
        'title',
        'slug',
        'short_code',
        'description',
        'base_capacity',
        'higher_capacity',
        'extra_bed',
        'kids_capacity',
        'base_price',
        'additional_person_price',
        'extra_bed_price',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'base_capacity' => 'integer',
        'higher_capacity' => 'integer',
        'extra_bed' => 'integer',
        'kids_capacity' => 'integer',
        'base_price' => 'decimal:2',
        'additional_person_price' => 'decimal:2',
        'extra_bed_price' => 'decimal:2',
        'status' => 'integer',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function regularPrices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\RegularPrice::class);
    }

    public function reservations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Reservation::class);
    }

    public function roomTypeImages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\RoomTypeImage::class);
    }

    public function rooms(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Room::class);
    }

    public function specialPrices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\SpecialPrice::class);
    }

    public function couponMasters(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\CouponMaster::class, 'coupon_pivot_include_room_type', 'room_type_id', 'coupon_id');
    }

    public function amenities(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Amenity::class, 'room_type_pivot_amenity', 'room_type_id', 'amenity_id');
    }
}