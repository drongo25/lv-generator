<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'first_name',
        'last_name',
        'phone',
        'dob',
        'address',
        'sex',
        'picture',
        'password',
        'id_type',
        'id_number',
        'id_card_image',
        'remarks',
        'vip',
        'email_verified',
        'email_verified_code',
        'sms_verified',
        'sms_verified_code',
        'status',
        'remember_token',
    ];

    protected $casts = [
        'id' => 'integer',
        'dob' => 'date',
        'vip' => 'integer',
        'email_verified' => 'integer',
        'sms_verified' => 'integer',
        'status' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function appliedCouponCodes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\AppliedCouponCode::class);
    }

    public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Payment::class);
    }

    public function reservations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Reservation::class);
    }

    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Transaction::class);
    }
}