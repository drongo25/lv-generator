<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'admins';

    protected $fillable = [
        'username',
        'email',
        'first_name',
        'last_name',
        'phone',
        'address',
        'sex',
        'picture',
        'status',
        'password',
        'remember_token',
        'role',
    ];

    protected $casts = [
        'id' => 'integer',
        'status' => 'integer',
        'role' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];


}