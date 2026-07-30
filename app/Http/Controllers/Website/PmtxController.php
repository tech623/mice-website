<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\PmtxHotel;
use Illuminate\Http\Request;
use App\Models\PmtxRegistration;

class PmtxController extends Controller
{
    protected $properties;

    public function __construct()
    {
        $this->properties = PmtxHotel::class;
    }

    public function create()
    {
        $hotels = PmtxHotel::all();
        return view('website.pmtx.create')->with('data', json_encode($hotels));;
    }

    public function registrationSubmit(Request $request){

        $message = [
            'hotel_id.required' => 'The hotel field is required.'
        ];
        $request->validate([
            'hotel_id' => "required",
            'guest_name' => 'required|string',
            'company_name' => 'required|string',
            'mobile_number' => 'required|numeric',
            'email' => 'required|email',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after_or_equal:check_in_date',
            'number_of_rooms' => 'required|numeric',
            'bed_type' => 'required|in:single,double',
        ],$message);


        $hotel = PmtxHotel::find($request->hotel_id);
        $price = 0;
        if($request->bed_type == "single"){
            $price = $hotel->single_bed_price;
        }elseif ($request->bed_type == "double") {
            $price = $hotel->double_bed_price;
        }else{
            $price = 0;
        }

        $data = $request->all();
        $data['bed_price'] = $price;
        $data['total_price'] = $price;
        $data['meal_plan'] = $hotel->meal_plan;
        PmtxRegistration::create($data);

        return response()->json(['success' => 'Data saved successfully']);
    }
}
