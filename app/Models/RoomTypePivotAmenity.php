<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomTypePivotAmenity extends Model
{
    use HasFactory;

    protected $table = 'room_type_pivot_amenity';

    protected $fillable = [
        'room_type_id',
        'amenity_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'room_type_id' => 'integer',
        'amenity_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function amenity(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Amenity::class);
    }

    public function roomType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\RoomType::class);
    }
}