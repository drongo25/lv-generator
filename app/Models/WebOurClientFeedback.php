<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebOurClientFeedback extends Model
{
    use HasFactory;

    protected $table = 'web_our_client_feedbacks';

    protected $fillable = [
        'feed',
        'name',
        'title',
    ];

    protected $casts = [
        'id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


}