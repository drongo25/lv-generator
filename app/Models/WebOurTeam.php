<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebOurTeam extends Model
{
    use HasFactory;

    protected $table = 'web_our_teams';

    protected $fillable = [
        'name',
        'title',
        'fb',
        'tw',
        'lin',
        'gp',
        'image',
    ];

    protected $casts = [
        'id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


}