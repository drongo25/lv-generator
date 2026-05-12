<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Amenity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'amenities';

    protected $fillable = [
        'name',
        'image',
        'description',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'status' => 'integer',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function roomTypes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\RoomType::class, 'room_type_pivot_amenity', 'amenity_id', 'room_type_id');
    }
}