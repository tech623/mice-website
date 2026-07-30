<?php

namespace App\Http\Controllers;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $enquiries = Enquiry::sortable()->orderBy('id','desc')->paginate(5);
        return view('enquiries.index', compact('enquiries'));
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Enquiry  $enquiry
    * @return \Illuminate\Http\Response
    */
    public function show(Enquiry $enquiry)
    {
        return view('enquiries.show',compact('enquiry'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Enquiry  $enquiry
    * @return \Illuminate\Http\Response
    */
    public function edit(Enquiry $enquiry)
    {
        return view('enquiries.edit',compact('enquiry'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\enquiry  $enquiry
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Enquiry $enquiry)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'source' => 'required',
            'location' => 'required',
            'created_at' => 'required',
            'status' => 'required',
        ]);
        
        $enquiry->fill($request->post())->save();

        return redirect()->route('enquiries.index')->with('success','Enquiry Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Enquiry  $enquiry
    * @return \Illuminate\Http\Response
    */
    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();
        return redirect()->route('enquiries.index')->with('success','Enquiry has been deleted successfully');
    }
}
