<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\SeoOptimization;
use Illuminate\Http\Request;
use App\Models\Services;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $services;

    public function __construct()
    {
        $this->services = Services::getServices();
    }

    public function index(Request $request, $pagenumber = null)
    {
        $getpage = explode('-', $pagenumber);
        // Pagination variables
        $itemsPerPage = 6; // Number of items to display per page
        $page = isset($getpage[1] ) ? $getpage[1]  : 1; // Current page number
        $offset = ($page - 1) * $itemsPerPage; // Offset for LIMIT clause

        $blogs = Blog::select("*")
                        ->offset($offset)
                        ->limit($itemsPerPage)
                        ->orderBy('id', 'desc');
                        
        if (!empty($request->input('search'))) {

            $blogs =  $blogs->where('blog_title', 'LIKE', '%' . $request->input('search') . '%');
        }
        $blogs =  $blogs->get();
        $selectedService = "";
        $services = $this->services;
        $currentPage = isset($getpage[1] ) ? $getpage[1]  : 1; // Current page number

        $totalItems = Blog::count();
        $totalPages = ceil($totalItems / $itemsPerPage);
        $seo = SeoOptimization::where('page_id',7)->first();
        return view('website.blogs.index', compact('blogs', 'selectedService', 'services','currentPage','totalPages','seo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
      $blog = Blog::where('blog_slug', $id)->first();
        if(!empty($blog)){
            $selectedService = "";
            $services = $this->services;
            return view('website.blogs.show', compact('blog','selectedService','services'));
        }
        
        return redirect()->route('blogs.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
