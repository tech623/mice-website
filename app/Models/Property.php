<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'property_title',
        'slug',
        'address',
        'total_rooms',
        'star',
        'amenities',
        'img_path',
        'status',
        'region',
        'description',
        'service_id',
        'location',
        'show_on_home_page'
    ];

    public static function list()
    {
        $list = Property::wherePropertyTitle("other")->first();
        $property_list = Property::orderBy('property_title','asc')->whereNotNull('description')->whereNotNull('img_path')->where('status',1)->where('property_title','!=','other')->get();
        // Concatenate the first row set in last
        $result = $property_list->push($list);
        return $result;
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(PropertyGallery::class);
    }

    public function onBanner(): HasMany
    {
        return $this->hasMany(PropertyGallery::class)->whereNotNull('property_galleries.on_banner')->orderBy('property_galleries.on_banner', 'asc');
    }

    public function testimonials(): HasMany
    {
        return $this->hasMany(PropertyTestimonials::class);
    }

    public static function getStates()
    {
        $stateList = Property::select('region')->distinct()->whereNotNull('img_path')->whereNotNull('description')->get();
        return $stateList;
    }

    public static function getCityByState($state)
    {
        $cityA = array();
        $cityList = Property::select('location')->distinct()->whereRegion($state)->whereNotNull('img_path')->whereNotNull('description')->get()->toArray();
        foreach ($cityList as $v) {
            array_push($cityA, $v['location']);
        }
        return array_chunk($cityA, 10);
    }
    
    public static function propertyList()
    {
        $row = Property::where('property_title','=','Other')->first();
        $row_first = Property::where('property_title','=','The Golden Palms Hotel & Spa')->first();
        $properties = Property::orderBy('property_title', 'asc')->where('status', 1)->where('property_title', '!=', 'Other')
        ->where('property_title', '!=', 'The Golden Palms Hotel & Spa')->get();
        $result = $properties->prepend($row_first);
        $result = $properties->push($row);
        return $result;
    }
}
