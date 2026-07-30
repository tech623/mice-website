<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Mail\SendImtexMail;
use App\Models\ImtexHotel;
use Illuminate\Http\Request;
use App\Models\ImtexRegistration;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class ImtexController extends Controller
{
    //

    protected $properties;

    public function __construct()
    {
        $this->properties = ImtexHotel::class;
    }

    public function create()
    {
        $hotels = ImtexHotel::where('property_type', 'imtex')->orderBy('distance_from_biec', 'asc')->get();
        return view('website.imtex.create')->with('data', json_encode($hotels));
    }

    public function registrationStore(Request $request)
    {
        //     Mail::to(['ashok.verma1098@gmail.com'])
        //         ->send(new SendImtexMail($reg));

        // dd(view('mails.imtexReg')->with(['mailData', $reg]));

        $message = [
            'hotel_id.required' => 'The hotel field is required.',
            'bed_type.required' => 'The occupancy type field is required.',
            'bed_type.in' => 'The selected occupancy type is invalid.',
        ];
        $request->validate([
            // 'category' => 'required',
            'hotel_id' => "required",
            'guest_name' => 'required|string',
            'company_name' => 'required|string',
            'mobile_number' => 'required|numeric',
            'email' => 'required|email',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after_or_equal:check_in_date',
            'number_of_rooms' => 'required|numeric',
            'bed_type' => 'required|in:single,double',
        ], $message);

        try {

            $hotel = ImtexHotel::find($request->hotel_id);
            $price = 0;
            if ($request->bed_type == "single") {
                $price = $hotel->single_bed_price;
            } elseif ($request->bed_type == "double") {
                $price = $hotel->double_bed_price;
            } else {
                $price = 0;
            }

            $data = $request->all();
            $data['bed_price'] = $price;
            $data['total_price'] = $price;
            $data['meal_plan'] = $hotel->meal_plan;
            $data['category'] = $hotel->category;
            $res = ImtexRegistration::create($data);

            $reg = ImtexRegistration::find($res->id);

            if (intval($reg->category) > 0) {
                $category = $reg->category . " Star";
            } else {
                $category = $reg->category;
            }
            $html = '<!DOCTYPE html><html>

<head>

    <title>Imtex Registration</title>

</head>

<body>
    <p style="margin: 0;">Dear Sir / Madam,</p>
    <p>We have received IMTEX ' . $reg->id . ' booking. The details are below:</p>
    <br />
    <p><b>Guest Name : </b>' . $reg->guest_name . '</p>
    <p><b>Mobile Number : </b>' . $reg->mobile_number . '</p>
    <p><b>Email : </b>' . $reg->email . '</p>
    <p><b>Check In Date : </b>' . \Carbon\Carbon::parse($reg->check_in_date)->format("d-m-Y") . '</p>
    <p><b>Check Out Date : </b>' . \Carbon\Carbon::parse($reg->check_out_date)->format("d-m-Y") . '</p>
    <p><b>Hotel Name : </b>' . $reg->imtexHotel->property_name . '</p>
    <p><b>Number Of Rooms : </b>' . $reg->number_of_rooms . '</p>
    <p><b>Bed Type : </b>' . ucfirst($reg->bed_type) . '</p>
    <p><b>Category : </b>
        ' . $category . '
    </p>
    <br/>
    <p>Regards</p>
    <p>Mice Hospitality</p>
</body></html>';
            $response = Http::post('https://8nvwnzgll8.execute-api.ap-south-1.amazonaws.com/prod/v1/send-mice-email', ['content' => $html, 'to' => 'banquets@micehospitality.com', 'cc' => [], 'subject' => 'Imtex Registration']);

            if($response->successful()){
                info('mail send success');
            }else {
                info('mail send failure');
            }

            return response()->json(['success' => 'Data saved successfully']);
        } catch (\Throwable $th) {

            return response()->json(['success' => 'Something went wrong!']);
        }
    }

    public function wsfcCreate(Request $request)
    {
        $hotels = ImtexHotel::where('property_type', 'windergy')->orderBy('distance_from_biec', 'asc')->get();
        return view('website.wsfc.create')->with('data', json_encode($hotels));;
    }

    public function registrationWindergyStore(Request $request)
    {
        //     Mail::to(['ashok.verma1098@gmail.com'])
        //         ->send(new SendImtexMail($reg));

        // dd(view('mails.imtexReg')->with(['mailData', $reg]));

        $message = [
            'hotel_id.required' => 'The hotel field is required.',
            'bed_type.required' => 'The occupancy type field is required.',
            'bed_type.in' => 'The selected occupancy type is invalid.',
        ];
        $request->validate([
            // 'category' => 'required',
            'hotel_id' => "required",
            'guest_name' => 'required|string',
            'company_name' => 'required|string',
            'mobile_number' => 'required|numeric',
            'email' => 'required|email',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after_or_equal:check_in_date',
            'number_of_rooms' => 'required|numeric',
            'bed_type' => 'required|in:single,double',
        ], $message);

        try {

            $hotel = ImtexHotel::find($request->hotel_id);
            $price = 0;
            if ($request->bed_type == "single") {
                $price = $hotel->single_bed_price;
            } elseif ($request->bed_type == "double") {
                $price = $hotel->double_bed_price;
            } else {
                $price = 0;
            }

            $data = $request->all();
            $data['bed_price'] = $price;
            $data['total_price'] = $price;
            $data['meal_plan'] = $hotel->meal_plan;
            $data['category'] = $hotel->category;
            $res = ImtexRegistration::create($data);

            $reg = ImtexRegistration::find($res->id);

            if (intval($reg->category) > 0) {
                $category = $reg->category . " Star";
            } else {
                $category = $reg->category;
            }
            $html = '<!DOCTYPE html><html>

<head>

    <title>Windergy Registration</title>

</head>

<body>
    <p style="margin: 0;">Dear Sir / Madam,</p>
    <p>We have received Windergy ' . $reg->id . ' booking. The details are below:</p>
    <br />
    <p><b>Guest Name : </b>' . $reg->guest_name . '</p>
    <p><b>Mobile Number : </b>' . $reg->mobile_number . '</p>
    <p><b>Email : </b>' . $reg->email . '</p>
    <p><b>Check In Date : </b>' . \Carbon\Carbon::parse($reg->check_in_date)->format("d-m-Y") . '</p>
    <p><b>Check Out Date : </b>' . \Carbon\Carbon::parse($reg->check_out_date)->format("d-m-Y") . '</p>
    <p><b>Hotel Name : </b>' . $reg->imtexHotel->property_name . '</p>
    <p><b>Number Of Rooms : </b>' . $reg->number_of_rooms . '</p>
    <p><b>Bed Type : </b>' . ucfirst($reg->bed_type) . '</p>
    <p><b>Category : </b>
        ' . $category . '
    </p>
    <br/>
    <p>Regards</p>
    <p>Mice Hospitality</p>
</body></html>';
            $response = Http::post('https://8nvwnzgll8.execute-api.ap-south-1.amazonaws.com/prod/v1/send-mice-email', ['content' => $html, 'to' => 'banquets@micehospitality.com', 'cc' => ["operations@pdaventures.com"], 'subject' => 'Windergy Booking 2025']);

            if ($response->successful()) {
                info('mail send success');
            } else {
                info('mail send failure');
            }
            return response()->json(['success' => 'Data saved successfully']);
        } catch (\Throwable $th) {

            return response()->json(['success' => 'Something went wrong!']);
        }
    }

    public function seaFoodCreate(Request $request)
    {
        $hotels = ImtexHotel::where('property_type', 'seaFood')->orderBy('distance_from_biec', 'asc')->get();
        return view('website.seaFood.create')->with('data', json_encode($hotels));;
    }

    public function registrationSeaFoodyStore(Request $request)
    {

        $message = [
            'hotel_id.required' => 'The hotel field is required.',
            'bed_type.required' => 'The occupancy type field is required.',
            'bed_type.in' => 'The selected occupancy type is invalid.',
        ];
        $request->validate([
            // 'category' => 'required',
            'hotel_id' => "required",
            'guest_name' => 'required|string',
            'company_name' => 'required|string',
            'mobile_number' => 'required|numeric',
            'email' => 'required|email',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after_or_equal:check_in_date',
            'number_of_rooms' => 'required|numeric',
            'bed_type' => 'required|in:single,double',
        ], $message);

        try {

            $hotel = ImtexHotel::find($request->hotel_id);
            $price = 0;
            if ($request->bed_type == "single") {
                $price = $hotel->single_bed_price;
            } elseif ($request->bed_type == "double") {
                $price = $hotel->double_bed_price;
            } else {
                $price = 0;
            }

            $data = $request->all();
            $data['bed_price'] = $price;
            $data['total_price'] = $price;
            $data['meal_plan'] = $hotel->meal_plan;
            $data['category'] = $hotel->category;
            $res = ImtexRegistration::create($data);

            $reg = ImtexRegistration::find($res->id);

            if (intval($reg->category) > 0) {
                $category = $reg->category . " Star";
            } else {
                $category = $reg->category;
            }
            $html = '<!DOCTYPE html><html>

<head>

    <title>Sea Food Congress Registration</title>

</head>

<body>
    <p style="margin: 0;">Dear Sir / Madam,</p>
    <p>We have received Sea Food Congress ' . $reg->id . ' booking. The details are below:</p>
    <br />
    <p><b>Guest Name : </b>' . $reg->guest_name . '</p>
    <p><b>Mobile Number : </b>' . $reg->mobile_number . '</p>
    <p><b>Email : </b>' . $reg->email . '</p>
    <p><b>Check In Date : </b>' . \Carbon\Carbon::parse($reg->check_in_date)->format("d-m-Y") . '</p>
    <p><b>Check Out Date : </b>' . \Carbon\Carbon::parse($reg->check_out_date)->format("d-m-Y") . '</p>
    <p><b>Hotel Name : </b>' . $reg->imtexHotel->property_name . '</p>
    <p><b>Number Of Rooms : </b>' . $reg->number_of_rooms . '</p>
    <p><b>Bed Type : </b>' . ucfirst($reg->bed_type) . '</p>
    <p><b>Category : </b>
        ' . $category . '
    </p>
    <br/>
    <p>Regards</p>
    <p>Mice Hospitality</p>
</body></html>';
            $response = Http::post('https://8nvwnzgll8.execute-api.ap-south-1.amazonaws.com/prod/v1/send-mice-email', ['content' => $html, 'to' => 'banquets@micehospitality.com', 'cc' => ["operations@pdaventures.com"], 'subject' => 'World Sea Food Conggress 2026']);

            if ($response->successful()) {
                info('mail send success');
            } else {
                info('mail send failure');
            }
            return response()->json(['success' => 'Data saved successfully']);
        } catch (\Throwable $th) {

            return response()->json(['success' => 'Something went wrong!']);
        }
    }
    
    public function brewSpiritCreate(Request $request)
    {
        $hotels = ImtexHotel::where('property_type', 'brew-and-spirit')->orderBy('distance_from_biec', 'asc')->get();
        return view('website.brew-and-spirit')->with('data', json_encode($hotels));;
    }

    public function registrationbrewSpiritStore(Request $request)
    {

        $message = [
            'hotel_id.required' => 'The hotel field is required.',
            'bed_type.required' => 'The occupancy type field is required.',
            'bed_type.in' => 'The selected occupancy type is invalid.',
        ];
        $request->validate([
            // 'category' => 'required',
            'hotel_id' => "required",
            'guest_name' => 'required|string',
            'company_name' => 'required|string',
            'mobile_number' => 'required|numeric',
            'email' => 'required|email',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after_or_equal:check_in_date',
            'number_of_rooms' => 'required|numeric',
            'bed_type' => 'required|in:single,double',
        ], $message);

        try {

            $hotel = ImtexHotel::find($request->hotel_id);
            $price = 0;
            if ($request->bed_type == "single") {
                $price = $hotel->single_bed_price;
            } elseif ($request->bed_type == "double") {
                $price = $hotel->double_bed_price;
            } else {
                $price = 0;
            }

            $data = $request->all();
            $data['bed_price'] = $price;
            $data['total_price'] = $price;
            $data['meal_plan'] = $hotel->meal_plan;
            $data['category'] = $hotel->category;
            $res = ImtexRegistration::create($data);

            $reg = ImtexRegistration::find($res->id);

            if (intval($reg->category) > 0) {
                $category = $reg->category . " Star";
            } else {
                $category = $reg->category;
            }
            $html = '<!DOCTYPE html><html>

<head>

    <title>Sea Food Congress Registration</title>

</head>

<body>
    <p style="margin: 0;">Dear Sir / Madam,</p>
    <p>We have received Sea Food Congress ' . $reg->id . ' booking. The details are below:</p>
    <br />
    <p><b>Guest Name : </b>' . $reg->guest_name . '</p>
    <p><b>Mobile Number : </b>' . $reg->mobile_number . '</p>
    <p><b>Email : </b>' . $reg->email . '</p>
    <p><b>Check In Date : </b>' . \Carbon\Carbon::parse($reg->check_in_date)->format("d-m-Y") . '</p>
    <p><b>Check Out Date : </b>' . \Carbon\Carbon::parse($reg->check_out_date)->format("d-m-Y") . '</p>
    <p><b>Hotel Name : </b>' . $reg->imtexHotel->property_name . '</p>
    <p><b>Number Of Rooms : </b>' . $reg->number_of_rooms . '</p>
    <p><b>Bed Type : </b>' . ucfirst($reg->bed_type) . '</p>
    <p><b>Category : </b>
        ' . $category . '
    </p>
    <br/>
    <p>Regards</p>
    <p>Mice Hospitality</p>
</body></html>';
            $response = Http::post('https://8nvwnzgll8.execute-api.ap-south-1.amazonaws.com/prod/v1/send-mice-email', ['content' => $html, 'to' => 'banquets@micehospitality.com', 'cc' => ["operations@pdaventures.com"], 'subject' => 'Brews & Spirits 2025']);

            if ($response->successful()) {
                info('mail send success');
            } else {
                info('mail send failure');
            }
            return response()->json(['success' => 'Data saved successfully']);
        } catch (\Throwable $th) {

            return response()->json(['success' => 'Something went wrong!']);
        }
    }
}
