<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartnerRequest extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'title',
        'firstname',
        'lastname',
        'email',
        'mobile_number',
        'property_name',
        'city',
        'additional_information'
    ];
}
