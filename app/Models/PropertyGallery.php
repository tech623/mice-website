<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyGallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'img_url',
        'property_id',
        'status'
    ];
}
