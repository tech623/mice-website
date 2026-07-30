<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory; 

    protected $fillable = [
        'deal_id',
        'enquiry_id',
        'file_url',
    ];

    public const WO_STATUS = [
        'Pending',
        'Accept',
        'Reject'
    ];
}
