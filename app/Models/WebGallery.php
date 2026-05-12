<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebGallery extends Model
{
    use HasFactory;

    protected $table = 'web_galleries';

    protected $fillable = [
        'image',
        'category_id',
        'type',
        'link',
    ];

    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


}