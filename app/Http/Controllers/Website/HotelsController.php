<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Enquiry;
use App\Models\Property;
use App\Models\ServicePropertyVideo;
use App\Models\PropertyTestimonials;
use App\Models\SeoOptimization;

class HotelsController extends Controller
{
    //
    protected $services;
    protected $properties;
    protected $service;
    protected $blogs;
    protected $testimonials;

    public function __construct()
    {
        $this->services = Services::getServices();
        $this->properties = Property::class;
        $this->service = Services::class;
        $this->blogs = Blog::latest()->limit(3)->get();
        $this->testimonials = PropertyTestimonials::class;
    }

    public function index()
    {
        $selectedService = "";
        $services = $this->services;
        $properties = $this->properties::whereNotNull('description')->whereNotNull('img_path')->where('status',1)->get();
        $videos = ServicePropertyVideo::latest()->limit(5)->get();
        $blogs = $this->blogs;
        $testimonials = $this->testimonials::get();
        $seo = SeoOptimization::where('page_id',10)->first();
        return view('website.hotels.index',compact('selectedService','services','properties','videos','blogs','testimonials','seo'));
    }
}
