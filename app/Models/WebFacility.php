<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebFacility extends Model
{
    use HasFactory;

    protected $table = 'web_facilities';

    protected $fillable = [
        'name',
        'image',
    ];

    protected $casts = [
        'id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


}