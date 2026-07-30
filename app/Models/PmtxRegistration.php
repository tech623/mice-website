<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PmtxRegistration extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'hotel_id',
        'guest_name',
        'company_name',
        'mobile_number',
        'email',
        'check_in_date',
        'check_out_date',
        'number_of_rooms',
        'category',
        'bed_type',
        'bed_price',
        'total_price',
        'meal_plan',
    ];

}
