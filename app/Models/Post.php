<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'cat_id',
        'title',
        'image',
        'thumb',
        'details',
        'status',
        'hit',
    ];

    protected $casts = [
        'id' => 'integer',
        'cat_id' => 'integer',
        'status' => 'integer',
        'hit' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


}