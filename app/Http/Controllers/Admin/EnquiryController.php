<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Deal;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEnquiryRequest;
use App\Models\Property;
use App\Models\RoomOccupancyDetail;
use App\Models\RoomType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EnquiryController extends Controller
{

    protected $USER;
    protected $USER_ID;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->USER = Auth::user();
            $this->USER_ID = $this->USER->id ?? null;
            return $next($request);
        });
    }

    public function filterenquiries(Request $request)
    {
        $filter = 0;
        $from_created_date = $request->from_created_date;
        $to_created_date = $request->to_created_date;
        $event_date = $request->event_date;
        $event_id = $request->event_id;
        if (!$from_created_date && !$to_created_date && !$event_date && !$event_id && $request->enquiryfilter == 'submitfilter') {
            $request->validate([
                'from_created_date' => 'required',
                'to_created_date' => 'required',
                'event_date' => 'required',
                'event_id' => 'required',
            ]);
        }
        if ($from_created_date || $to_created_date) {
            $request->validate([
                'from_created_date' => 'required',
                'to_created_date' => 'required',
            ]);
        }
        $query = Enquiry::select('enquiries.*', 'services.service_name', 'properties.property_title', 'accounts.company_name')
            ->join('services', 'services.id', '=', 'enquiries.event_id')
            ->join('properties', 'properties.id', '=', 'enquiries.venue')
            ->join('contacts', 'contacts.email', '=', 'enquiries.email')
            ->join('accounts', 'accounts.id', '=', 'contacts.company_id');

        if (!auth()->user()->can('is_admin')) {
            $query = $query->where('created_by', $this->USER_ID);
        }

        if ($from_created_date && $to_created_date) {
            $query = $query->whereBetween(Enquiry::raw("(DATE_FORMAT(enquiries.created_at,'%Y-%m-%d'))"), [$from_created_date, $to_created_date]);
        }
        if ($event_date) {
            $datestr = explode('-', $event_date);
            $year = $datestr[0];
            $month = $datestr[1];
            $query = $query->whereMonth('enquiries.proposed_start_date', $month);
            $query = $query->whereYear('enquiries.proposed_start_date', $year);
            $query = $query->whereMonth('enquiries.proposed_end_date_date', $month);
            $query = $query->whereYear('enquiries.proposed_end_date_date', $year);
        }
        if ($event_id) {
            $query = $query->where('enquiries.event_id', '=', $event_id);
        }
        if ($from_created_date || $to_created_date || $event_date || $event_id) {
            $filter = 1;
        }
        $enquiries = $query->orderBy('enquiries.id', 'desc')->paginate(10);
        $services = Services::get();
        return view('admin.enquiry.index', compact('enquiries', 'filter', 'services'));
    }

    // public function filterenquiries(Request $request)
    // {
    //     $filter = 0;
    //     $created_date = $request->created_date;
    //     $event_id = $request->event_id;
    //     if(!$created_date && !$event_id && $request->enquiryfilter == 'submitfilter')
    //     {
    //         $request->validate([
    //             'created_date' => 'required',
    //             'event_id' => 'required',
    //         ]);
    //     }
    //     $query = Enquiry::select('enquiries.*', 'services.service_name', 'properties.property_title', 'accounts.company_name')
    //     ->join('services', 'services.id', '=', 'enquiries.event_id')
    //     ->join('properties', 'properties.id', '=', 'enquiries.venue')
    //     ->join('contacts', 'contacts.email', '=', 'enquiries.email')
    //     ->join('accounts', 'accounts.id', '=', 'contacts.company_id');

    //     if (!auth()->user()->can('is_admin')) {
    //         $query = $query->where('created_by',$this->USER_ID);
    //     }

    //     if($created_date)
    //     {
    //         $query = $query->where(Enquiry::raw("(DATE_FORMAT(enquiries.created_at,'%Y-%m-%d'))"),"=",$created_date);
    //     }
    //     if($event_id)
    //     {
    //         $query = $query->where('enquiries.event_id', '=', $event_id);
    //     }
    //     if($created_date || $event_id)
    //     {
    //         $filter = 1;
    //     }
    //     $enquiries = $query->orderBy('enquiries.id','desc')->paginate(10);
    //     $services = Services::get();
    //     return view('admin.enquiry.index', compact('enquiries','filter','services'));
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('inquiry-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $filter = 0;
        $from_created_date = $request->from_created_date;
        $to_created_date = $request->to_created_date;
        $event_date = $request->event_date;
        $event_id = $request->event_id;
        $status = $request->status;
        $user_id = $request->user_id;
        $page = $request->page;
        if (!$from_created_date && !$to_created_date && !$event_date && !$event_id && !$status && !$user_id && $request->enquiryfilter == 'submitfilter') {
            $request->validate([
                'from_created_date' => 'required',
                'to_created_date' => 'required',
                'event_date' => 'required',
                'event_id' => 'required',
                'status' => 'required',
                'user_id' => 'required',
            ]);
        }
        if ($from_created_date || $to_created_date) {
            $request->validate([
                'from_created_date' => 'required',
                'to_created_date' => 'required',
            ]);
        }

        // $enquiries = Enquiry::select('enquiries.*', 'services.service_name', 'properties.property_title', 'accounts.company_name')
        // ->join('services', 'services.id', '=', 'enquiries.event_id')
        // ->join('properties', 'properties.id', '=', 'enquiries.venue')
        // ->join('contacts', 'contacts.email', '=', 'enquiries.email')
        // ->join('accounts', 'accounts.id', '=', 'contacts.company_id');

        $enquiries = Enquiry::select('enquiries.*', 'services.service_name', 'accounts.company_name')
        ->join('services', 'services.id', '=', 'enquiries.event_id')
        ->join('contacts', 'contacts.email', '=', 'enquiries.email')
        ->join('accounts', 'accounts.id', '=', 'contacts.company_id');

        if (!auth()->user()->can('is_admin')) {
            $enquiries = $enquiries->where('created_by', $this->USER_ID);
        }

        if ($from_created_date && $to_created_date) {
            $enquiries = $enquiries->whereBetween(Enquiry::raw("(DATE_FORMAT(enquiries.created_at,'%Y-%m-%d'))"), [$from_created_date, $to_created_date]);
        }
        if ($event_date) {
            $datestr = explode('-', $event_date);
            $year = $datestr[0];
            $month = $datestr[1];
            $enquiries = $enquiries->whereMonth('enquiries.proposed_start_date', $month);
            $enquiries = $enquiries->whereYear('enquiries.proposed_start_date', $year);
            $enquiries = $enquiries->whereMonth('enquiries.proposed_end_date_date', $month);
            $enquiries = $enquiries->whereYear('enquiries.proposed_end_date_date', $year);

            //$enquiries = $enquiries->orWhereMonth('enquiries.event_date', $month);
            //$enquiries = $enquiries->orWhereYear('enquiries.event_date', $year);
        }
        if ($event_id) {
            $enquiries = $enquiries->where('enquiries.event_id', '=', $event_id);
        }
        if ($status) {
            $enquiries = $enquiries->where('enquiries.status', '=', $status);
        }
        if ($user_id) {
            $enquiries = $enquiries->where('enquiries.created_by', '=', $user_id);
        }

        if ($from_created_date || $to_created_date || $event_date || $event_id || $status || $user_id) {
            $filter = 1;
        }

        $enquiries = $enquiries->sortable()->orderBy('id', 'desc')->paginate(25);
        $services = Services::orderByRaw('FIELD(service_name, "Conference Organizer", "Team Outing", "Banquets","FIT","ODC","Travel Planner","Wedding Planning","Event management")')->get();
        $users = User::get();
        return view('admin.enquiry.index', compact('enquiries', 'filter', 'services', 'users', 'page'));
        // abort_if(Gate::denies('inquiry-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $filter = 0;
        // $enquiries = Enquiry::select('enquiries.*', 'services.service_name', 'properties.property_title', 'accounts.company_name')
        // ->join('services', 'services.id', '=', 'enquiries.event_id')
        // ->join('properties', 'properties.id', '=', 'enquiries.venue')
        // ->join('contacts', 'contacts.email', '=', 'enquiries.email')
        // ->join('accounts', 'accounts.id', '=', 'contacts.company_id');



        // if (!auth()->user()->can('is_admin')) {
        //     $enquiries = $enquiries->where('created_by',$this->USER_ID);
        // }
        // $enquiries = $enquiries->sortable()->orderBy('id','desc')->paginate(10);
        // $services = Services::get();
        // return view('admin.enquiry.index', compact('enquiries','filter','services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('inquiry-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $services = Services::orderByRaw('FIELD(service_name, "Conference Organizer", "Team Outing", "Banquets","FIT","ODC","Travel Planner","Wedding Planning","Event management")')->get();
        $property = Property::propertyList();
        $roomTypes = RoomType::get();
        return view('admin.enquiry.create', compact('services', 'property','roomTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnquiryRequest $request)
    {
        abort_if(Gate::denies('inquiry-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        DB::beginTransaction();
        try {
            $submit = $request->all();
            $submit['created_by'] = $this->USER_ID;
            if ($submit['status'] == '') {
                $submit['status'] = "tentative";
            }

            if (in_array($request->event_id, Enquiry::EVENT_IDS)){
                $charges = $request->number_of_guests * $request->tariff;
                $gst_charges = $charges * $request->gst / 100;
                $total_charges = $charges + $gst_charges;
                $submit['room_charges'] = $charges;
                $submit['gst_charge'] = $gst_charges;
                $submit['applied_gst'] = $request->gst;
                $submit['total_cost'] = $total_charges;
            } else {
                $roomTariffs = $request->input('tariff_of_room');
                $roomOccupancies = $request->input('room_occupancy');
                $noOfRooms = $request->input('no_of_rooms');
                $roomType = $request->input('room_type');
                $roomGST = $request->input('room_gst');

                foreach ($roomTariffs as $index => $tariff) {
                    $occupancy = $roomOccupancies[$index];
                    $rooms = $noOfRooms[$index];
                    $roomTypes = $roomType[$index];

                    $room_gst = $roomGST[$index];
                    $room_totaltariff = $tariff * $rooms;
                    $room_gstcharges = $room_totaltariff * $room_gst / 100;
                    $room_totalcharges = $room_totaltariff + $room_gstcharges;
                    // Create a new RoomDetails instance and save it to the database
                    RoomOccupancyDetail::create([
                        'room_type' => $roomTypes,
                        'room_occupancy' => $occupancy,
                        'tariff_of_room' => $tariff,
                        'no_of_rooms' => $rooms,
                        'room_charges' => $tariff * $rooms,

                        'room_gst' => $room_gst,
                        'room_gst_charges' => $room_gstcharges,
                        'room_total_charges' => $room_totalcharges,
                        // Other columns if applicable
                    ]);
                }

                $sum_of_room_charges = RoomOccupancyDetail::whereNull('enquiry_id')->get()->sum('room_charges');
                $total_triff_of_single_and_double = $sum_of_room_charges * $request->number_of_room_nights;

                $sum_of_room_gst_charges = RoomOccupancyDetail::whereNull('enquiry_id')->get()->sum('room_gst_charges');
                $gst_charges = $sum_of_room_gst_charges * $request->number_of_room_nights;

                //$gst_charges = $total_triff_of_single_and_double * $request->gst / 100;
                
                $total_charges = $total_triff_of_single_and_double + $gst_charges;
                $submit['room_charges'] = $total_triff_of_single_and_double;
                $submit['gst_charge'] = $gst_charges;
                //$submit['applied_gst'] = $request->gst;
                $submit['total_cost'] = $total_charges;
            }
            $save = Enquiry::create($submit);
            $enquiry_id = $save->id;
            RoomOccupancyDetail::whereNull('enquiry_id')->update([
                'enquiry_id' => $enquiry_id
            ]);
            $this->insertdealdata($submit, $enquiry_id);
            DB::commit();
            return back()->with('success', 'Enquiry submitted successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('panel.enquiry.create')->with('exceptionError', $e->getMessage())->withInput();
        }
    }

    public function insertdealdata($data, $enquiry_id)
    {
        // accounts table
        $acctvalue = DB::table('accounts')->where('company_name', $data['company_name'])->value('id');
        if (!$acctvalue) {
            $account_id = DB::table('accounts')->insertGetId([
                'company_name' => $data['company_name'], 'created_at' => now(),
                'updated_at' => now()
            ]);
        } else {
            $account_id = $acctvalue;
        }

        // contacts table
        $contvalue = DB::table('contacts')->where('email', $data['email'])->value('id');
        if (!$contvalue) {
            $contact_id = DB::table('contacts')->insertGetId(
                [
                    'company_id' => $account_id, 'first_name' => $data['firstname'], 'last_name' => $data['lastname'], 'email' => $data['email'],
                    'phone' => $data['phone'], 'client_designation' => $data['client_designation'], 'created_at' => now(), 'updated_at' => now()
                ]
            );
        } else {
            $contact_id = $contvalue;
        }

        // deals table
        $dealvalue = Deal::insert(
            [
                'contact_id' => $contact_id,
                'enquiry_id' => $enquiry_id,
                'source' => $data['source'],
                'event_id' => $data['event_id'],
                'location' => $data['location'],
                'venue' => $data['venue'],
                'event_start_date' => $data['proposed_start_date'],
                'event_end_date' => $data['proposed_end_date_date'],
                'number_of_guests' => $data['number_of_guests'],
                'status' => $data['status'],
                'comments' => $data['comments'],
                'number_of_rooms' => $data['number_of_rooms'],
                'number_of_room_nights' => $data['number_of_room_nights'],
                'meal_plan' => $data['meal_plan'],
                'meal_package' => $data['meal_package'],
                'assigned_to_user' => $this->USER_ID,
                'applied_gst' => $data['applied_gst'] ?? 0,
                'room_charges' => $data['room_charges'] ?? 0,
                'gst_charge' => $data['gst_charge'] ?? 0,
                'total_cost' => $data['total_cost'] ?? 0,
                'tariff' => $data['tariff'] ?? 0,
                'created_by' => $this->USER_ID,
                'updated_by' => $this->USER_ID,
                'created_at' => now(), 'updated_at' => now()
            ]
        );
        $deal_id = DB::getPdo()->lastInsertId();

        DB::table('deals_status_history')->insert(
            ['deal_id' => $deal_id, 'status' => $data['status'], 'status_days' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $enquiry)
    {
        return view('admin.enquiry.show', compact('enquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $enquiry)
    {
        abort_if(Gate::denies('inquiry-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $property = Property::select("property_title")->where('id', $enquiry->venue)->first();
        $event = Services::select("service_name")->where('id', $enquiry->event_id)->first();
        $company = DB::table('accounts')->select('accounts.company_name')
            ->join('contacts', 'contacts.company_id', '=', 'accounts.id')->where('email', $enquiry->email)->first();
        return view('admin.enquiry.edit', compact('enquiry', 'event', 'company', 'property'));
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
        abort_if(Gate::denies('inquiry-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'created_at' => 'required',
        ]);
        if ($request['chkenquiry']) {
            $enquiry->updated_by = $request['chkenquiry'];
        }
        $enquiry->fill($request->post())->save();

        return redirect()->route('panel.enquiry.index')->with('success', 'Enquiry Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $enquiry)
    {
        abort_if(Gate::denies('inquiry-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //getting the record want to copy
        $enquiryreq = Enquiry::find($enquiry->id);

        //copy using replicate and setting destination table by setTable()
        $enquiryreq->deleted_at = now();
        $enquiryreq->replicate()->setTable('enquiries_trash')->save();

        //remove record from original table
        $enquiry->delete();
        return redirect()->route('panel.enquiry.index')->with('success', 'Enquiry has been deleted successfully');
    }
}
