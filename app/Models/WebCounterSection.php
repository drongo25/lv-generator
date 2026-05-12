<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebCounterSection extends Model
{
    use HasFactory;

    protected $table = 'web_counter_sections';

    protected $fillable = [
        'name',
        'number',
    ];

    protected $casts = [
        'id' => 'integer',
        'number' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


}