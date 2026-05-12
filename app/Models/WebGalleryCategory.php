<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebGalleryCategory extends Model
{
    use HasFactory;

    protected $table = 'web_gallery_categories';

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


}