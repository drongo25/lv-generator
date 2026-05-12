<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $table = 'general_settings';

    protected $fillable = [
        'title',
        'hotel_name',
        'hotel_email',
        'hotel_phone',
        'hotel_address',
        'color',
        'cur',
        'cur_sym',
        'reg',
        'ev',
        'mv',
        'en',
        'mn',
        'sender_email',
        'email_message',
        'sms_api',
        'meta_key_word',
        'meta_description',
        'meta_author',
    ];

    protected $casts = [
        'id' => 'integer',
        'reg' => 'integer',
        'ev' => 'integer',
        'mv' => 'integer',
        'en' => 'integer',
        'mn' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


}