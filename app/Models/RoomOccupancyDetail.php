<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomOccupancyDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_occupancy',
        'tariff_of_room',
        'no_of_rooms',
        'room_charges',
        'room_type',
        'enquiry_id',
        'room_gst',
        'room_gst_charges',
        'room_total_charges'
    ];

    public function roomTypesDetails(): BelongsTo
    {
        return $this->belongsTo(RoomType::class,'room_type');
    }
}
