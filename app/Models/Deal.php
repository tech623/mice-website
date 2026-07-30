<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use App\Models\Enquiry;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Deal extends Model
{
    use HasFactory;
    protected $fillable = [
        'source',
        'location',
        'venue',
        'number_of_guests',
        'status',
        'assigned_to_user',
        'event_id',
        'event_start_date',
        'event_end_date',
        'event_date',
        'number_of_rooms',
        'number_of_room_nights',
        'meal_plan',
        'meal_package',
        'number_of_pax',
        'contact_id',
        'enquiry_id',
        'total_cost',
        'mice_percentage',
        'mice_revenue',
        'applied_gst',
        'room_charges',
        'gst_charge',
        'tariff',
        'updated_by',
        'created_by'
    ];

    protected $appends = [
        'current_status'
    ];

    public function getCurrentStatusAttribute()
    {
        $collection = collect(Enquiry::DEAL_STATUS);
        $userNames = $collection->where('slug', $this->status)->first();
        return $userNames['status'] ?? "";
    }

    public function assignUserName(): BelongsTo
    {
        return $this->belongsTo(User::class,'assigned_to_user');
    }

    public function enquiryOwner(): HasOneThrough
    {
        return $this->hasOneThrough(
            User::class,
            Enquiry::class,
            'id', // Foreign key on the cars table...
            'id', // Foreign key on the owners table...
            'enquiry_id', // Local key on the mechanics table...
            'created_by' // Local key on the cars table...
        );
    }

    public function enquiry(): BelongsTo
    {
        return $this->belongsTo(Enquiry::class,'enquiry_id','id');
    }

    public function contact()
    {
        $contvalue = DB::table('contacts')->where('id', $this->contact_id)->first();
        return $contvalue->first_name. ' '.$contvalue->last_name ?? "";
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Services::class,'event_id','id');
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class,'venue','id');
    }

    public function dealComment(): HasMany
    {
        return $this->hasMany(DealComment::class,'deal_id','id');
    }

    public function roomOccupancyDetails(): HasMany
    {
        return $this->hasMany(RoomOccupancyDetail::class,'enquiry_id','enquiry_id');
    }

    public function offerletter(): BelongsTo
    {
        return $this->belongsTo(OfferLetter::class,'id','deal_id');
    }
}
