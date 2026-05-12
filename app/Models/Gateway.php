<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gateway extends Model
{
    use HasFactory;

    protected $table = 'gateways';

    protected $fillable = [
        'main_name',
        'name',
        'minamo',
        'maxamo',
        'fixed_charge',
        'percent_charge',
        'rate',
        'val1',
        'val2',
        'val3',
        'val4',
        'val5',
        'val6',
        'val7',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'minamo' => 'decimal:2',
        'maxamo' => 'decimal:2',
        'fixed_charge' => 'decimal:2',
        'percent_charge' => 'decimal:2',
        'rate' => 'decimal:2',
        'status' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Payment::class);
    }

    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Transaction::class);
    }
}