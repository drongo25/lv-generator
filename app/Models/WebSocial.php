<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebSocial extends Model
{
    use HasFactory;

    protected $table = 'web_socials';

    protected $fillable = [
        'name',
        'icon',
        'link',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


}