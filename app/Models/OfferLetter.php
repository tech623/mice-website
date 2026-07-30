<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfferLetter extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'deal_id',
        'enquiry_id',
        'created_by',
        'package_detail',
        'meal_detail',
        'address',
        'city',
        'pincode',
        'wo_sent',
        'payment_link',
    ];

    public function enquirydata(): BelongsTo
    {
        return $this->belongsTo(Enquiry::class,'enquiry_id','id');
    }
}
