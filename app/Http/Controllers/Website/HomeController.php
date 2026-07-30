<?php

namespace App\Http\Controllers\Website;

use App\Models\Services;
use App\Models\Enquiry;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\EnquiryController;
use App\http\Requests\StoreEnquiryRequest;
use App\Models\Blog;
use App\Models\OurTeam;
use App\Models\Property;
use App\Models\PropertyGallery;
use App\Models\PropertyTestimonials;
use App\Models\SeoOptimization;
use App\Models\ServicePropertyVideo;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
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
        $services = $this->services;
        $properties = $this->properties::where('show_on_home_page', 1)->where('status', 1)->whereNotNull('description')->orderBy('id', 'desc')->get();
        $selectedService = "";
        $blogs =  Blog::get();
        $videos = ServicePropertyVideo::latest()->limit(5)->get();
        $seo = SeoOptimization::where('page_id',8)->first(); 
        return view('welcome', compact('services', 'properties', 'selectedService', 'blogs', 'videos','seo'));
    }


    public function service()
    {
        return view('website.service');
    }

    public function conferencesMeeting()
    {
        $services = $this->services;
        //$properties = $this->properties::limit(6)->whereServiceId(1)->get();
        $getService = $this->service::find(1);
        $properties = $getService->properties;
        $selectedService = $getService->service_name;
        $videos = $getService->videos;
        $blogs =  $this->blogs;
        $testimonials = $this->testimonials::get();
        $seo = SeoOptimization::where('page_id',1)->first();
        return view('website.conferences-meeting', compact('services', 'properties', 'selectedService', 'getService', 'videos', 'blogs', 'testimonials', 'seo'));
    }

    public function weddingService()
    {
        $services = $this->services;
        $getService = $this->service::find(6);
        $properties = $getService->properties;
        $selectedService = $getService->service_name;
        $videos = $getService->videos;
        $blogs =  $this->blogs;
        $testimonials = $this->testimonials::get();
        $seo = SeoOptimization::where('page_id',6)->first();
        return view('website.wedding-service', compact('services', 'properties', 'selectedService', 'getService', 'videos', 'blogs', 'testimonials','seo'));
    }

    public function eventManagment()
    {
        $services = $this->services;
        $getService = $this->service::find(2);
        $properties = $getService->properties;
        $selectedService = $getService->service_name;
        $videos = $getService->videos;
        $blogs =  $this->blogs;
        $testimonials = $this->testimonials::get();
        $seo = SeoOptimization::where('page_id',2)->first();
        return view('website.event-management', compact('services', 'properties', 'selectedService', 'getService', 'videos', 'blogs', 'testimonials','seo'));
    }

    public function dayouts()
    {
        $services = $this->services;
        $getService = $this->service::find(3);
        $properties = $getService->properties;
        $selectedService = $getService->service_name;
        $videos = $getService->videos;
        $blogs =  $this->blogs;
        $testimonials = $this->testimonials::get();
        $seo = SeoOptimization::where('page_id',3)->first();
        return view('website.dayouts-service', compact('services', 'properties', 'selectedService', 'getService', 'videos', 'blogs', 'testimonials','seo'));
    }

    public function travelManagement()
    {
        $services = $this->services;
        $getService = $this->service::find(4);
        $properties = $getService->properties;
        $selectedService = $getService->service_name;
        $videos = $getService->videos;
        $blogs =  $this->blogs;
        $testimonials = $this->testimonials::get();
        $seo = SeoOptimization::where('page_id',4)->first();
        return view('website.travel-management', compact('services', 'properties', 'selectedService', 'getService', 'videos', 'blogs', 'testimonials','seo'));
    }

    public function tourHandling()
    {
        $services = $this->services;
        $getService = $this->service::find(5);
        $properties = $getService->properties;
        $selectedService = $getService->service_name;
        $videos = $getService->videos;
        $blogs =  $this->blogs;
        $testimonials = $this->testimonials::get();
        $seo = SeoOptimization::where('page_id',5)->first();
        return view('website.tour-handling', compact('services', 'properties', 'selectedService', 'getService', 'videos', 'blogs', 'testimonials','seo'));
    }

    public function propertyDetail($propertyid, $propertyslug)
    {
        $getservices = Services::whereIn('id',[1,2,3,4,6])->get();
        $property_detail = Property::find($propertyid);
        $testimonials = $property_detail->testimonials;
        $properties = $this->properties::whereLocation($property_detail->location)->where('id','!=', $propertyid)->where('status',1)->whereNotNull('description')->whereNotNull('img_path')->get();
        $blogs =  Blog::latest()->limit(3)->get();
        $videos = ServicePropertyVideo::latest()->limit(5)->get();
        $selectedService = "";
        $services = $this->services;
        return view('website.property-detail', compact('services','getservices', 'property_detail', 'properties', 'blogs', 'videos', 'testimonials','selectedService'));
    }

    public function submit_enquiry(Request $request)
    {
        $submit = $request->all();
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'location' => 'required|string',
            'venue' => 'required|string',
            'event_date_range' => 'required',
            'number_of_guests' => 'required|numeric',
            'event_id' => 'required|numeric'
        ]);
        //$submit['source'] = "website";
        $submit['status'] = "open";
        if ($validator->passes()) {
            $submit['source'] = "website";
            $submit['status'] = "open";
            $submit['comments'] = "";
            $save = Enquiry::create($submit);
            $objEnquiryController = new EnquiryController();
            $enquiry_id = $save->id;
            $objEnquiryController->insertdealdata($submit, $enquiry_id);
            return response()->json(['success' => 'Enquiry submitted successfully.']);
        }
        return response()->json(['error' => $validator->errors()]);
    }

    public function search(Request $request)
    {
        // dd($request->input('location'));
        $services = $this->services;
        $properties = $this->properties::whereNotNull('description')->whereNotNull('img_path')->where('status',1)->get();
        $selectedService = $request->input('service');

        if (!empty($request->input('service'))) {
            $service = Services::where('service_name', $request->input('service'))->first();
            $request->session()->put('service_id', $service->id);
            $properties = $service->properties;
        }

        if (!empty($request->input('location'))) {
            $properties = $properties->where('location', strtolower($request->input('location')));
        }

        return view('website.search-service', compact('services', 'properties', 'selectedService'));
    }

    public function contactUs()
    {
        $services = $this->services;
        $selectedService = "";
        return view('website.contact-us', compact('services','selectedService'));
    }

    public function whyMice()
    {
        $teams = OurTeam::get();
        $services = $this->services;
        $selectedService = "";
        $seo = SeoOptimization::where('page_id',11)->first();
        return view('website.why-mice', compact('teams','services','selectedService','seo'));
    }

    public function partnerWithUs()
    {
        $videos = ServicePropertyVideo::latest()->limit(5)->get();
        $blogs =  Blog::latest()->limit(3)->get();
        $services = $this->services;
        $selectedService = "";
        $seo = SeoOptimization::where('page_id',9)->first();
        return view('website.partner-with-us', compact('videos', 'blogs','services','selectedService','seo'));
    }

    public function getProperties(Request $request) {
        $getService = $this->service::find($request->input('service_id'));
        $properties['cities'] = $getService->properties;
        return response()->json($properties);
    }
}
