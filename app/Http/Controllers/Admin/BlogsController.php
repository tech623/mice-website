<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('blog-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            
        $blogs = Blog::orderBy('id','desc')->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('blog-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        abort_if(Gate::denies('blog-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $submit = $request->all();
        $submit['full_description'] = htmlentities($request->full_description);
        $submit['blog_slug'] = $request->blog_slug;
        if($request->hasfile('banner_image')) 
        {
            //$imagename = 'blogimg_'.time().'.'.$request->banner_image->extension();
            //$filePath = 'blogs/' . $imagename;
            //$path = Storage::disk('s3')->put($filePath, file_get_contents($request->banner_image),'public');

            //$submit['banner_image'] = 'https://d6z2xbkmha48l.cloudfront.net/'.$filePath;



            // Upload image to local disk
            $image = $request->banner_image;
            $imagename = 'blogimg_'.time().'.'.$image->extension();
            $destinationPath = 'images/blogs/';
            $image->move($destinationPath, $imagename);
            //$submit['img_path'] = '/images/property/'.$imagename;
            $submit['banner_image'] = asset('images/blogs/'.$imagename);
            }
        $save = Blog::create($submit);
        return back()->with('success', 'Blog submitted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        abort_if(Gate::denies('blog-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        abort_if(Gate::denies('blog-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $errorMessages = [
            'blog_slug.regex' => "The letter contain only dashes.",
        ];
        
        $request->validate([
            'blog_title' => 'required',
            'thumbnail_description' => 'required',
            'full_description' => 'required',
            'blog_slug' => 'required|regex:/^[a-zA-Z0-9-]+$/',
        ], $errorMessages);
        
        if($request->banner_image_db == '' && $request->banner_image == '')
        {
            $request->validate([
                'banner_image' => 'required',
            ]);
        }
        if($request->hasfile('banner_image')) 
        {
            //$imagename = 'blogimg_'.time().'.'.$request->banner_image->extension();
            //$filepath = 'blogs/' . $imagename;
            //$path = Storage::disk('s3')->put($filepath, file_get_contents($request->banner_image),'public');

            //$blog->banner_image = 'https://d6z2xbkmha48l.cloudfront.net/'.$filepath;



            // Upload image to local disk
            $image = $request->banner_image;
            $imagename = 'blogimg_'.time().'.'.$image->extension();
            $destinationPath = 'images/blogs/';
            $image->move($destinationPath, $imagename);
            //$submit['img_path'] = '/images/property/'.$imagename;
           $blog->banner_image = asset('images/blogs/'.$imagename);
        }
        $blog->full_description = htmlentities($request->full_description);
        $blog->blog_slug = $request->blog_slug;
        $blog->fill($request->post())->save();
        return redirect()->route('panel.blogs.index')->with('success','Blog Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        abort_if(Gate::denies('blog-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blog->delete();
        return redirect()->route('panel.blogs.index')->with('success','Blog has been deleted successfully');
    }
}
