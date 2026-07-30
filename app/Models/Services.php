<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_name',
        'description',
        'img_path'
    ];

    public static function getServices()
    {
        $services = Services::ALL_SERVICES; 
        return array_chunk($services, 4);
    }

    public const ALL_SERVICES = [
        [
            "service_name" => "Conferences & meeting",
            "slug" => "conferences-meeting",
            "img_path" => "cm.svg"
        ],
        [
            "service_name" => "Dayouts and ODC",
            "slug" => "day-outs",
            "img_path" => "do.svg"
        ],
        [
            "service_name" => "Wedding & social events",
            "slug" => "wedding-service",
            "img_path" => "sw.svg"
        ],
        [
            "service_name" => "Event management",
            "slug" => "event-management",
            "img_path" => "em.svg"
        ],
        [
            "service_name" => "Travel management",
            "slug" => "travel-management",
            "img_path" =>"tm.svg"
        ],
    ];

    public function videos(): HasMany
    {
        return $this->hasMany(ServicePropertyVideo::class,'service_id','id');
    }

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class,'property_has_services','service_id')->whereNotNull('properties.description')->whereNotNull('img_path')->where('status',1)->orderBy('property_title','asc');
    }
}
