<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomTypeImage extends Model
{
    use HasFactory;

    protected $table = 'room_type_images';

    protected $fillable = [
        'image',
        'room_type_id',
        'featured',
    ];

    protected $casts = [
        'id' => 'integer',
        'room_type_id' => 'integer',
        'featured' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function roomType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\RoomType::class);
    }
}