<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Property;
use Illuminate\Http\Request;

class SiteMapController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $blogArray = array();
        $blogs = Blog::get()->pluck('blog_slug')->toArray();
        foreach ($blogs as $key => $value) {
            array_push($blogArray,array(
                'loc' => route('blogs.show',$value),
                'changefreq' => "daily",
                'priority' => "0.8"
            ));
        }
        
        $propertyArray = array();
        $properties = Property::select('slug','id')->whereNotNull('description')->whereNotNull('img_path')->where('status',1)->get()->toArray();

        foreach ($properties as $key => $value) {
            array_push($propertyArray,array(
                'loc' => route('property-detail',[$value['id'],$value['slug']]),
                'changefreq' => "daily",
                'priority' => "0.8"
            ));
        }

        $staticUrls = array(
            [
                'loc' => route('home'),
                'changefreq' => "daily",
                'priority' => "0.8"
            ],
            [
                'loc' => route('conferences-meeting'),
                'changefreq' => "daily",
                'priority' => "0.8"
            ],
            [
                'loc' => route('wedding-service'),
                'changefreq' => "daily",
                'priority' => "0.8"
            ],
            [
                'loc' => route('event-managment'),
                'changefreq' => "daily",
                'priority' => "0.8"
            ],
            [
                'loc' => route('dayouts-service'),
                'changefreq' => "daily",
                'priority' => "0.8"
            ],
            [
                'loc' => route('travel-managment'),
                'changefreq' => "daily",
                'priority' => "0.8"
            ],
            [
                'loc' => route('tour-handling'),
                'changefreq' => "daily",
                'priority' => "0.8"
            ],
            [
                'loc' => route('hotels.index'),
                'changefreq' => "daily",
                'priority' => "0.8"
            ],
            [
                'loc' => route('blogs.index'),
                'changefreq' => "daily",
                'priority' => "0.8"
            ],
            [
                'loc' => route('contact-us'),
                'changefreq' => "daily",
                'priority' => "0.8"
            ],
            [
                'loc' => route('why-mice'),
                'changefreq' => "daily",
                'priority' => "0.8"
            ],
            [
                'loc' => route('partner-with-us'),
                'changefreq' => "daily",
                'priority' => "0.8"
            ],
            [
                'loc' => route('hotel-owners'),
                'changefreq' => "daily",
                'priority' => "0.8"
            ],
        );
        $urls = array_merge($staticUrls, $propertyArray, $blogArray);
        
        return response()->view('sitemap', compact('urls'))->header('Content-Type', 'text/xml');
    }
}
