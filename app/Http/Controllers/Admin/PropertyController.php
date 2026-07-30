<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Services;
use App\Http\Requests\StorePropertyRequest;
use App\Models\PropertyBanner;
use App\Models\PropertyGallery;
use App\Models\PropertyHasService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('property-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $property = Property::orderBy('id','desc')->get();
        return view('admin.property.index',compact('property'));
    }

    public function create()
    {
        abort_if(Gate::denies('property-create'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 

        $services = Services::get();
        return view('admin.property.create', compact('services'));
    }

    public function store(StorePropertyRequest $request)
    {
        abort_if(Gate::denies('property-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $submit = $request->all();

        // Upload image to AWS s3
        if($request->hasfile('img_path')) 
        {
            // Upload image to AWS s3
            //$imagename = 'propimg_'.time().'.'.$request->img_path->extension();
            //$filePath = 'property/' . $imagename;
            //$path = Storage::disk('s3')->put($filePath, file_get_contents($request->img_path),'public');

            //$submit['img_path'] = 'https://d6z2xbkmha48l.cloudfront.net/'.$filePath;


            // Upload image to local disk
            $image = $request->img_path;
            $imagename = 'propimg_'.time().'.'.$image->extension();
            $destinationPath = 'images/property/';
            $image->move($destinationPath, $imagename);
            //$submit['img_path'] = '/images/property/'.$imagename;
            $submit['img_path'] = 'https://www.micehospitality.com/images/property/'.$imagename;
        }

        // Create Slug
        $slug = str_replace(" ", "-", strtolower($request->property_title));
        $submit['slug'] = $slug;

        $submit['location'] = strtolower($request->location);
        $submit['region'] = strtolower($request->region);

        $save = Property::create($submit);

        // Data insertion into 'property_has_services' table
        if($request->property_service)
        {
            $property_id = $save->id;
            foreach($request->property_service as $prservice)
            {
                PropertyHasService::insert(['service_id' => $prservice, 'property_id' => $property_id]);
            }
        }
        return back()->with('success', 'Property details submitted successfully.');
    }

    public function edit(Property $property)
    {
        abort_if(Gate::denies('property-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Services::get();

        $data = PropertyHasService::select('service_id')->where('property_id', $property->id)->get();
        
        $propsrvdata = []; 
        foreach ($data as $key => $val) 
        { 
            $propsrvdata[] = $val->service_id; 
        }
        return view('admin.property.edit',compact('property','services','propsrvdata'));
    }

    public function update(Request $request, Property $property)
    {
        abort_if(Gate::denies('property-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'property_title' => 'required',
            'address' => 'required',
            'total_rooms' => 'required',
            'description' => 'required',
            'star' => 'required',
            'location' => 'required',
            'region' => 'required',
            'property_service' => 'required'
        ]);
        if($request->property_image_db == '' && $request->img_path == '')
        {
            $request->validate([
                'img_path' => 'required',
            ]);
        }
        // Upload image to AWS s3
        if($request->hasfile('img_path')) 
        {
            // Upload image to AWS s3
            //$imagename = 'propimg_'.time().'.'.$request->img_path->extension();
            //$filepath = 'property/' . $imagename;
            //$path = Storage::disk('s3')->put($filepath, file_get_contents($request->img_path),'public');

            //$property->img_path = 'https://d6z2xbkmha48l.cloudfront.net/'.$filepath;


            // Upload image to local disk
            $image = $request->img_path;
            $imagename = 'propimg_'.time().'.'.$image->extension();
            $destinationPath = 'images/property/';
            $image->move($destinationPath, $imagename);
            //$property->img_path = '/images/property/'.$imagename;
            $property->img_path = 'https://www.micehospitality.com/images/property/'.$imagename;
        }

        // Create Slug
        $slug = str_replace(" ", "-", strtolower($request->property_title));
        $property->slug = $slug;

        $property->location = strtolower($request->location);
        $property->region = strtolower($request->region);

        $property->fill($request->post())->save();

        
        if($request->property_service)
        {
            $property_id = $property->id;

            // Delete all entries from 'property_has_services' table for the property id
            PropertyHasService::where('property_id', $property_id)->delete();

            foreach($request->property_service as $prservice)
            {
                // Data insertion into 'property_has_services' table
                PropertyHasService::insert(['service_id' => $prservice, 'property_id' => $property_id]);
            }
        }

        return redirect()->route('panel.property.index')->with('success','Property Has Been updated successfully.');
    }
    
    public function destroy(Property $property)
    {
        abort_if(Gate::denies('property-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 

        $property->delete();
        return redirect()->route('panel.property.index')->with('success','Property has been deleted successfully.');
    }

    public function show(Request $request, Property $property)
    {
        abort_if(Gate::denies('property-gallery'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 

        $pid = $property->id;
        $prop_gallery = PropertyGallery::orderBy('on_banner','asc')->where('property_id', $property->id)->get();   
        return view('admin.property.gallery',compact('prop_gallery','pid'));
    }

    public function uploadimages(Request $request)
    {
        abort_if(Gate::denies('property-gallery'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 

        $request->validate([
            'images' => 'required',
            'images.*' => 'required|mimes:jpg,jpeg,png|max:2048',
        ],
        $message = [               
            "images.*.mimes" => "This Image type is not allowed.", 
            "images.*.max" => "Max Image size is 2Mb.",
        ]
        );

        $images = [];
        if ($request->images)
        {
            $propid = $request->id;
            foreach($request->images as $key => $image)
            {
                // Upload image to AWS s3
                //$imagename = 'propimg_'.time().rand(1,99).'.'.$image->extension();
                //$filepath = 'property/' . $imagename;
                //$path = Storage::disk('s3')->put($filepath, file_get_contents($image),'public');

                //$img_url = 'https://d6z2xbkmha48l.cloudfront.net/'.$filepath;


                // Upload image to local disk
                $imagename = 'propimg_'.time().rand(1,99).'.'.$image->extension();
                $destinationPath = 'images/property/';
                $image->move($destinationPath, $imagename);
                //$img_url = '/images/property/'.$imagename;
                $img_url = 'https://www.micehospitality.com/images/property/'.$imagename;
                
                $images[]['name'] = $img_url;

                // Insert Images in property galleries table
                PropertyGallery::insert(
                    ['img_url' => $img_url, 'property_id' => $propid, 'created_at' => now(), 'updated_at' => now()]
                );
            }
        }

        return back()->with('success','You have successfully upload images.')->with('images', $images); 
    }

    public function deleteimage(PropertyGallery $id)
    {
        abort_if(Gate::denies('property-gallery-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 
        $id->delete();
        return back()->with('success','Property Image has been deleted successfully.');
    }

    public function upload_banner(Request $request){
        $messages = [
            'image_id.required' => 'Banner need 3 Images. So please select 3 Images.',
            'image_id.min' => 'The banner must have atleast 3 images.',
            'image_id.max' => 'Can not select more than 3 items.',
        ];

        $request->validate([
            'image_id' => 'required|array|min:3|max:3',
        ], $messages);

        $images = $request->input('image_id');
        for ($i=0; $i <=2 ; $i++) {
            $image = $images[$i];
            $gallery = PropertyGallery::find($image);
            $gallery->on_banner = $i +1;
            $gallery->save();
        }
        
        return response()->json(['success' => 'Banner added successfully.']);
    }
}
