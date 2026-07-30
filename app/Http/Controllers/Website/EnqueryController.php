<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Deal;
use App\Models\Enquiry;
use App\Models\PartnerRequest;
use App\Models\Property;
use App\Models\Services;
use App\Models\User;
use App\Notifications\SendEnqueryMail;
use App\Rules\CheckOutDateRule;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Rules\NumberOfRoomsRule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EnqueryController extends Controller
{
    //

    protected $service;

    public function __construct()
    {
        $this->service = Services::class;
    }

    public function index()
    {
        $services = $this->service::get();
        return view('website.inquery', compact('services'));
    }

    public function submit_request(Request $request)
    {
        $messages = [
            'property_id.required' => 'The property type field is required',
        ];


        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required|numeric||regex:/^[0-9]{10,15}$/',
            'property_name' => 'required',
            'city' => 'required',
            'additional_information' => 'required',
        ], $messages);

        if ($validator->passes()) {
            PartnerRequest::create($request->all());
            return response()->json(['success' => 'Inquiry submitted successfully.']);
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }

    public function submit_enquiry(Request $request)
    {
        $messages = [
            'property_id.required' => 'The Hotel type field is required',
        ];


        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
           // 'organisation_name' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required|numeric|regex:/^[0-9]{10,15}$/',
            'event_type' => ['required', Rule::in(['1', '3', '6', '2', '4', '5']),],
            'destination' => 'required',
            'property_id' => 'required',
            'check_in_date' => 'required_if:event_type,1,6',
            'check_out_date' => [new CheckOutDateRule($request)],
            'number_of_rooms' => 'required|numeric',
            'number_of_room_nights' => 'required|numeric',
            'meal_plan' => 'required',
            'meal_package' => 'required',
            'event_date' => 'required_if:event_type,3',
            'number_of_pax' => 'required_if:event_type,3',
        ], $messages);

        if ($validator->passes()) {
            $data = array();

            $data['title'] = $request->input('title');
            $data['firstname'] = $request->input('firstname');
            $data['lastname'] = $request->input('lastname');
            $data['phone'] = $request->input('mobile_number');
            $data['email'] = $request->input('email');
            $data['event_id'] = $request->input('event_type');
            $data['location'] = $request->input('destination');
            $data['venue'] = $request->input('property_id');
            $data['number_of_rooms'] = $request->input('number_of_rooms');
            $data['number_of_room_nights'] = $request->input('number_of_room_nights');
            $data['meal_plan'] = $request->input('meal_plan');
            $data['meal_package'] = $request->input('meal_package');
            $data['client_designation'] = $request->input('client_designation');
            
            $data['source'] = "website";
            $data['status'] = "tentative";

            if(Auth::check()){
                $data['created_by'] = Auth::user()->id;
            }

            $enquiry = Enquiry::create($data);

            if ($enquiry) {

                $getE = Enquiry::find($enquiry->id);
                if ($request->input('event_type') == 1 || $request->input('event_type') == 6) {

                    $getE->check_in_date = $request->input('check_in_date');
                    $getE->check_out_date = $request->input('check_out_date');
                    $getE->proposed_start_date = $request->input('check_in_date');
                    $getE->proposed_end_date_date = $request->input('check_out_date');
                    $getE->save();
                } elseif ($request->input('event_type') == 3) {
                    $getE->event_date = $request->input('event_date');
                    $getE->number_of_pax = $request->input('number_of_pax');
                    $getE->number_of_guests = $request->input('number_of_pax');
                    $getE->save();
                }
            }

            $dealData = array(
                'source' => 'website',
                'status' => "tentative",
                'event_id' => $getE->event_id,
                'location' => $getE->location,
                'venue' => $getE->venue,
                'event_start_date' => $request->input('check_in_date'),
                'event_end_date' => $request->input('check_out_date'),
                'number_of_pax' => $request->input('number_of_pax'),
                'number_of_guests' => $request->input('number_of_pax'),
                'event_date'  => $request->input('event_date'),
                'number_of_rooms'  => $request->input('number_of_rooms'),
                'number_of_room_nights'  => $request->input('number_of_room_nights'),
                'meal_plan'  => $request->input('meal_plan'),
                'meal_package'  => $request->input('meal_package'),
            );
            
            if(!empty($request->input('organisation_name'))){
                $company_name = $request->input('organisation_name');
            }else{
                $company_name = $request->input('firstname')." ".$request->input('lastname');
            }

            $client_designation = $request->input('client_designation');

            $deal = $this->insertdealData($dealData, $getE, $company_name, $client_designation);

            DB::table('deals_status_history')->insert(
                ['deal_id' => $deal->id,'status' => $deal->status,'status_days' => 0,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]
            );
            
            $mailMessage = array(
                "name" => $enquiry->name,
                "email" => $enquiry->email,
                "phone" => $enquiry->phone,
                'service' => $enquiry->service->service_name,
                'venue' => $enquiry->venue,
                'location' => $enquiry->location,
            );
            $admin = Admin::find(1);
            $admin->notify(new SendEnqueryMail($mailMessage));
            return response()->json(['success' => 'Inquiry submitted successfully.']);
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }

    public function insertdealData($dealData, $inquiry, $company_name, $client_designation)
    {
        $acctvalue = DB::table('accounts')->where('company_name', $company_name)->value('id');
        if (!$acctvalue) {
            $account_id = DB::table('accounts')->insertGetId([
                'company_name' => $company_name, 'created_at' => now(),
                'updated_at' => now()
            ]);
        } else {
            $account_id = $acctvalue;
        }

        // contacts table
        $contvalue = DB::table('contacts')->where('email', $inquiry->email)->value('id');
        if (!$contvalue) {
            $contact_id = DB::table('contacts')->insertGetId(
                [
                    'company_id' => $account_id, 'client_designation' => $client_designation, 'first_name' => $inquiry->firstname, 'last_name' => $inquiry->lastname, 'email' => $inquiry->email,
                    'phone' => $inquiry->phone, 'created_at' => now(), 'updated_at' => now()
                ]
            );
        } else {
            $contact_id = $contvalue;
        }


        $dealvalue = Deal::create(
            [
                'contact_id' => $contact_id,
                'enquiry_id' => $inquiry->id,
                'source' => $dealData['source'],
                'event_id' => $dealData['event_id'],
                'location' => $dealData['location'],
                'venue' => $dealData['venue'],
                'status' => $dealData['status'],
                //'created_at' => now(), 'updated_at' => now(),
                'event_date' => $dealData['event_date'],
                'event_start_date' => $dealData['event_start_date'],
                'event_end_date' => $dealData['event_end_date'],
                'number_of_rooms' => $dealData['number_of_rooms'],
                'number_of_room_nights' => $dealData['number_of_room_nights'],
                'meal_plan' => $dealData['meal_plan'],
                'meal_package' => $dealData['meal_package'],
                'number_of_pax' => $dealData['number_of_pax'],
                'number_of_guests' => $dealData['number_of_pax'],
            ]
        );
        return $dealvalue;
    }

}
