<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxManager extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tax_managers';

    protected $fillable = [
        'name',
        'code',
        'type',
        'rate',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'rate' => 'decimal:2',
        'status' => 'integer',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function reservationTaxes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\ReservationTax::class, 'tax_id');
    }
}