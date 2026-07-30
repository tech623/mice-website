<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicePropertyVideo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'video_url',
        'service_id',
        'property_id',
        'status',
    ];
}
