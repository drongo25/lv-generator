<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'user_id',
        'gateway_id',
        'amount',
        'usd_amo',
        'trx',
        'status',
        'try',
        'btc_amo',
        'btc_wallet',
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'gateway_id' => 'integer',
        'amount' => 'decimal:2',
        'usd_amo' => 'decimal:2',
        'status' => 'integer',
        'try' => 'integer',
        'btc_amo' => 'decimal:2',
        'btc_wallet' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function gateway(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Gateway::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}