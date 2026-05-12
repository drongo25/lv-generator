<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'uid',
        'date',
        'user_id',
        'room_type_id',
        'adults',
        'kids',
        'check_in',
        'check_out',
        'number_of_room',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'uid' => 'integer',
        'date' => 'datetime',
        'user_id' => 'integer',
        'room_type_id' => 'integer',
        'adults' => 'integer',
        'kids' => 'integer',
        'check_in' => 'date',
        'check_out' => 'date',
        'number_of_room' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function roomType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\RoomType::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function appliedCouponCodes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\AppliedCouponCode::class);
    }

    public function reservationNights(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\ReservationNight::class);
    }

    public function reservationPaidServices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\ReservationPaidService::class);
    }

    public function reservationTaxes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\ReservationTax::class);
    }
}