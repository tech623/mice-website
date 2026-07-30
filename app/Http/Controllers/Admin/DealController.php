<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Enquiry;
use App\Models\Property;
use App\Models\RoomOccupancyDetail;
use App\Models\RoomType;
use App\Models\User;
use App\Models\Services;
use App\Notifications\AssignInquiryNotification;
use App\Notifications\DealChangesNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Models\OfferLetter;
use App\Models\WorkOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class DealController extends Controller
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

    public function filterdeals(Request $request)
    {
        $filter = 0;
        $from_created_date = $request->from_created_date;
        $to_created_date = $request->to_created_date;
        $event_date = $request->event_date;
        $event_id = $request->event_id;
        $user_id = $request->user_id;
        if (!$from_created_date && !$to_created_date && !$event_date && !$event_id && !$user_id && $request->dealfilter == 'submitfilter') {
            $request->validate([
                'from_created_date' => 'required',
                'to_created_date' => 'required',
                'event_date' => 'required',
                'event_id' => 'required',
                'user_id' => 'required',
            ]);
        }
        if ($from_created_date || $to_created_date) {
            $request->validate([
                'from_created_date' => 'required',
                'to_created_date' => 'required',
            ]);
        }
        $query = Deal::select('deals.*', 'users.name', 'services.service_name')->leftjoin('users', 'users.id', '=', 'deals.assigned_to_user')
            ->join('services', 'services.id', '=', 'deals.event_id');

        if ($from_created_date && $to_created_date) {
            $query = $query->whereBetween(Deal::raw("(DATE_FORMAT(deals.created_at,'%Y-%m-%d'))"), [$from_created_date, $to_created_date]);
        }
        if ($event_date) {
            $datestr = explode('-', $event_date);
            $year = $datestr[0];
            $month = $datestr[1];
            $query = $query->whereMonth('deals.event_start_date', $month);
            $query = $query->whereYear('deals.event_start_date', $year);
            $query = $query->whereMonth('deals.event_end_date', $month);
            $query = $query->whereYear('deals.event_end_date', $year);
        }
        if ($event_id) {
            $query = $query->where('deals.event_id', '=', $event_id);
        }
        if ($user_id) {
            $query = $query->where('deals.assigned_to_user', '=', $user_id);
        }
        if ($from_created_date || $to_created_date || $event_date || $event_id || $user_id) {
            $filter = 1;
        }
        $deals = $query->orderBy('deals.id', 'desc')->paginate(10);
        $users = User::get();
        $services = Services::get();
        return view('admin.deals.index', compact('deals', 'filter', 'users', 'services'));
    }


    // public function filterdeals(Request $request)
    // {
    //     $filter = 0;
    //     $created_date = $request->created_date;
    //     $event_id = $request->event_id;
    //     $user_id = $request->user_id;
    //     if (!$created_date && !$event_id && !$user_id && $request->dealfilter == 'submitfilter') {
    //         $request->validate([
    //             'created_date' => 'required',
    //             'event_id' => 'required',
    //             'user_id' => 'required',
    //         ]);
    //     }
    //     $query = Deal::select('deals.*', 'users.name', 'services.service_name')->leftjoin('users', 'users.id', '=', 'deals.assigned_to_user')
    //         ->join('services', 'services.id', '=', 'deals.event_id');

    //     if ($created_date) {
    //         $query = $query->where(Deal::raw("(DATE_FORMAT(deals.created_at,'%Y-%m-%d'))"), "=", $created_date);
    //     }
    //     if ($event_id) {
    //         $query = $query->where('deals.event_id', '=', $event_id);
    //     }
    //     if ($user_id) {
    //         $query = $query->where('deals.assigned_to_user', '=', $user_id);
    //     }
    //     if ($created_date || $event_id || $user_id) {
    //         $filter = 1;
    //     }
    //     $deals = $query->orderBy('deals.id', 'desc')->paginate(10);
    //     $users = User::get();
    //     $services = Services::get();
    //     return view('admin.deals.index', compact('deals', 'filter', 'users', 'services'));
    // }
    public function index(Request $request)
    {
        abort_if(Gate::denies('deal-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $filter = 0;
        $status = '';

        $from_created_date = $request->from_created_date;
        $to_created_date = $request->to_created_date;
        $event_date = $request->event_date;
        $event_id = $request->event_id;
        $user_id = $request->user_id;
        $page = $request->page;

        if (!$from_created_date && !$to_created_date && !$event_date && !$event_id && !$user_id && $request->dealfilter == 'submitfilter') {
            $request->validate([
                'from_created_date' => 'required',
                'to_created_date' => 'required',
                'event_date' => 'required',
                'event_id' => 'required',
                'user_id' => 'required',
            ]);
        }
        if ($from_created_date || $to_created_date) {
            $request->validate([
                'from_created_date' => 'required',
                'to_created_date' => 'required',
            ]);
        }

        // $deals = Deal::with(['enquiryOwner'])->select('deals.*', 'users.name', 'services.service_name', 'properties.property_title', 
        // 'contacts.first_name', 'contacts.last_name', 'contacts.email', 'contacts.phone', 'accounts.company_name')
        // ->leftjoin('users', 'users.id', '=', 'deals.assigned_to_user')
        // ->join('services', 'services.id', '=', 'deals.event_id')
        // ->join('properties', 'properties.id', '=', 'deals.venue')
        // ->join('contacts', 'contacts.id', '=', 'deals.contact_id')
        // ->join('accounts', 'accounts.id', '=', 'contacts.company_id');

        $deals = Deal::with(['enquiryOwner'])->select('deals.*', 'services.service_name', 'accounts.company_name')
        ->join('services', 'services.id', '=', 'deals.event_id')
        ->join('contacts', 'contacts.id', '=', 'deals.contact_id')
        ->join('accounts', 'accounts.id', '=', 'contacts.company_id');

        if ($this->USER->hasRole(4)) {
            $deals->where('assigned_to_user', $this->USER_ID);
        }

        if ($from_created_date && $to_created_date) {
            $deals = $deals->whereBetween(Deal::raw("(DATE_FORMAT(deals.created_at,'%Y-%m-%d'))"), [$from_created_date, $to_created_date]);
        }
        if ($event_date) {
            $datestr = explode('-', $event_date);
            $year = $datestr[0];
            $month = $datestr[1];
            $deals = $deals->whereMonth('deals.event_start_date', $month);
            $deals = $deals->whereYear('deals.event_start_date', $year);
            $deals = $deals->whereMonth('deals.event_end_date', $month);
            $deals = $deals->whereYear('deals.event_end_date', $year);
        }
        if ($event_id) {
            $deals = $deals->where('deals.event_id', '=', $event_id);
        }
        if ($user_id) {
            $deals = $deals->where('deals.assigned_to_user', '=', $user_id);
        }
        if ($from_created_date || $to_created_date || $event_date || $event_id || $user_id) {
            $filter = 1;
        }

        $deals = $deals->orderBy('id', 'desc')->paginate(10);

        $users = User::get();
        $services = Services::orderByRaw('FIELD(service_name, "Conference Organizer", "Team Outing", "Banquets","FIT","ODC","Travel Planner","Wedding Planning","Event management")')->get();
        return view('admin.deals.index', compact('deals', 'filter', 'users', 'services', 'status', 'page'));
    }
    public function edit(Deal $deal)
    {
        //dd($deal->roomOccupancyDetails->toArray());
        abort_if(Gate::denies('deal-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deal_contact = Deal::select(
            "contacts.id",
            "contacts.company_id",
            "contacts.first_name",
            "contacts.last_name",
            "contacts.email",
            "contacts.phone",
            "contacts.client_designation",
            "accounts.company_name",
            "accounts.industry_type"
        )->join("contacts", "contacts.id", "=", "deals.contact_id")
            ->join("accounts", "accounts.id", "=", "contacts.company_id")->where('deals.id', $deal->id)->first();
        $users = User::whereHas('roles', function ($q) {
            $q->where('name', '!=', 'consumer');
        })->get();
        $services = Services::orderByRaw('FIELD(service_name, "Conference Organizer", "Team Outing", "Banquets","FIT","ODC","Travel Planner","Wedding Planning","Event management")')->get();
        $deal_comments = DB::table('deal_comments')->select('deal_comments.comments', 'deal_comments.created_at', 'users.name')
            ->join('users', 'users.id', '=', 'deal_comments.posted_by')->where('deal_id', $deal->id)->orderBy('deal_comments.id', 'asc')->get();
        $property = Property::propertyList();
        $roomTypes = RoomType::get();
        return view('admin.deals.edit', compact('deal', 'deal_contact', 'users', 'services', 'deal_comments', 'property', 'roomTypes'));
    }
    public function update(Request $request, Deal $deal)
    {
        abort_if(Gate::denies('deal-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($request->action == 'submitdeal') {
            $request->validate([
                'location' => 'required',
                'venue' => 'required',
                //'number_of_guests' => 'required',
                //'event_start_date' => 'required',
                // 'event_end_date' => 'required',
            ]);
            DB::beginTransaction();

            try {

                if ($request->assigned_to_user != $deal->assigned_to_user && $request->assigned_to_user != null) {
                    $user = User::find($request->assigned_to_user);
                    $user->notify(new AssignInquiryNotification($deal->id, $user));
                }

                if (in_array($request->event_id, Enquiry::EVENT_IDS)) {
                    $charges = $request->number_of_guests * $request->tariff;
                    $gst_charges = $charges * $request->gst / 100;
                    $total_charges = $charges + $gst_charges;

                    $deal->room_charges = $charges;
                    $deal->gst_charge = $gst_charges;
                    $deal->applied_gst = $request->gst;
                    $deal->total_cost = $total_charges;

                    Enquiry::where('id', $deal->enquiry_id)->update([
                        'number_of_guests' => $request->number_of_guests,
                        'applied_gst' => $request->gst,
                        'room_charges' => $charges,
                        'gst_charge' => $gst_charges,
                        'total_cost' => $total_charges
                    ]);
                } else {
                    $roomTariffs = $request->input('tariff_of_room');
                    $roomOccupancies = $request->input('room_occupancy');
                    $noOfRooms = $request->input('no_of_rooms');
                    $roomType = $request->input('room_type');
                    $roomGST = $request->input('room_gst');

                    RoomOccupancyDetail::where('enquiry_id', $deal->enquiry_id)->delete();

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
                            'enquiry_id' => $deal->enquiry_id,
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

                    $sum_of_room_charges = RoomOccupancyDetail::where('enquiry_id', $deal->enquiry_id)->get()->sum('room_charges');
                    $charges = $sum_of_room_charges * $request->number_of_room_nights;

                    $sum_of_room_gst_charges = RoomOccupancyDetail::where('enquiry_id', $deal->enquiry_id)->get()->sum('room_gst_charges');
                    $gst_charges = $sum_of_room_gst_charges * $request->number_of_room_nights;

                    //$gst_charges = $charges * $request->gst / 100;
                    $total_charges = $charges + $gst_charges;

                    $deal->room_charges = $charges;
                    $deal->gst_charge = $gst_charges;
                    //$deal->applied_gst = $request->gst;
                    $deal->total_cost = $total_charges;

                    Enquiry::where('id', $deal->enquiry_id)->update([
                        'number_of_rooms' => $request->number_of_rooms,
                        //'applied_gst' => $request->gst,
                        'room_charges' => $charges,
                        'gst_charge' => $gst_charges,
                        'total_cost' => $total_charges
                    ]);
                }

                if ($request['mice_percentage'] != null) {
                    $deal->mice_revenue = ($charges * $request['mice_percentage']) / 100;
                }
                if (Auth::user()->id != $deal->created_by) {
                    $deal->updated_by = Auth::user()->id;
                }
                $deal->fill($request->post())->save();
                $this->insertdealstatuschanges($deal, $request);

                if (Auth::user()->id != $deal->assigned_to_user && $request->assigned_to_user != null && $deal->wasChanged() == 'true') {
                    $user = User::find($deal->assigned_to_user);
                    $inq_uniqueid = Enquiry::where('id', $deal->enquiry_id)->value('enquery_unique_id');
                    $user->notify(new DealChangesNotification($deal->id, $user, $inq_uniqueid));
                }

                DB::commit();
                return redirect()->route('panel.deals.index')->with('success', 'Deal has been updated successfully');
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->route('panel.deals.edit', $deal->id)->with('exceptionError', $e->getMessage())->withInput();
            }
        } elseif ($request->action == 'submitcontact') {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'company_name' => 'required',
                'client_designation' => 'required',
            ]);

            $id = $request->con_id;
            $company_id = $request->con_compid;
            $fname = $request->first_name;
            $lname = $request->last_name;
            $email = $request->email;
            $phone = $request->phone;
            $compname = $request->company_name;
            $industype = $request->industry_type;
            $designation = $request->client_designation;


            $contvalue = DB::table('contacts')->where('email', $email)->value('id');
            if (!$contvalue) {
                $contact_id = DB::table('contacts')->insertGetId(
                    [
                        'company_id' => $company_id, 'first_name' => $fname, 'last_name' => $lname, 'email' => $email,
                        'phone' => $phone, 'client_designation' => $designation, 'created_at' => now(), 'updated_at' => now()
                    ]
                );
                Deal::where(['id' => $deal->id])->update(['contact_id' => $contact_id]);
            } else {
                Deal::where(['id' => $deal->id])->update(['contact_id' => $contvalue]);
                DB::table('contacts')->where(['id' => $contvalue])->update([
                    'first_name' => $fname, 'last_name' => $lname, 'phone' => $phone, 'client_designation' => $designation,
                    'updated_at' => now()
                ]);
            }

            $companyid = DB::table('accounts')->where('company_name', $compname)->value('id');
            if (!$companyid) {
                $account_id = DB::table('accounts')->insertGetId(
                    ['company_name' => $compname, 'industry_type' => $industype, 'created_at' => now(), 'updated_at' => now()]
                );
                DB::table('contacts')->where(['email' => $email])->update(['company_id' => $account_id, 'updated_at' => now()]);
            } else {
                DB::table('contacts')->where(['email' => $email])->update(['company_id' => $companyid, 'updated_at' => now()]);
            }

            if ($industype && $companyid) {
                DB::table('accounts')->where(['id' => $company_id])->update(['industry_type' => $industype, 'updated_at' => now()]);
            }

            return redirect()->route('panel.deals.index')->with('success', 'Contact has been updated successfully');
        } elseif ($request->action == 'submitcomment') {
            $comments = htmlentities($request->comments);
            $postuser = auth()->user()->id;
            $request->validate([
                'comments' => 'required',
            ]);
            if ($comments) {
                DB::table('deal_comments')->insert(
                    ['deal_id' => $deal->id, 'comments' => $comments, 'posted_by' => $postuser, 'created_at' => now(), 'updated_at' => now()]
                );
            }
            return redirect()->back()->with('success', 'Comment has been added successfully');
        }
    }
    public function destroy(Deal $deal)
    {
        abort_if(Gate::denies('deal-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deal->delete();
        return redirect()->route('panel.deals.index')->with('success', 'Deal has been deleted successfully');
    }

    public function revoke($id)
    {
        $deal = Deal::find($id);
        $deal->assigned_to_user = null;
        $deal->save();
        return redirect()->route('panel.deals.index')->with('success', 'Deal has been revoked successfully');
    }

    public function insertdealstatuschanges($deal, $request)
    {
        $deal_histid = DB::table('deals_status_history')->where('deal_id', $deal->id)->where('status', $request->status)->value('id');
        if (!$deal_histid) {
            $status = collect(Enquiry::DEAL_STATUS)->where('id', 4)->pluck('slug')->first();

            $deal_time_exists = DB::table('deals_status_history')->where('deal_id', $deal->id)->orderby('created_at', 'desc')->first();


            if (!$deal_time_exists) {
                $start_date = Carbon::createFromFormat('Y-m-d H:i:s', $deal->created_at)
                    ->format('Y-m-d');

                $end_date = Carbon::today();
                $predate = Carbon::parse($start_date);

                $countDay = $predate->diffInDays($end_date);

                $data = [
                    'deal_id' => $deal->id,
                    'status' => $request->status,

                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];

                if ($request->status == $status) {
                    $total_days = DB::table('deals_status_history')->where('deal_id', $deal->id)->sum('status_days');
                    $data['status_days'] = $total_days;
                } else {
                    $data['status_days'] = $countDay;
                }

                DB::table('deals_status_history')->insert($data);
            } else {
                $start_date = Carbon::createFromFormat('Y-m-d H:i:s', $deal_time_exists->created_at)
                    ->format('Y-m-d');
                $end_date = Carbon::today();
                $predate = Carbon::parse($start_date);
                $countDay = $predate->diffInDays($end_date);

                DB::table('deals_status_history')
                    ->where('id', $deal_time_exists->id)
                    ->update(array(
                        'status_days' => $countDay,
                        'updated_at' => Carbon::now()
                    ));

                $data = [
                    'deal_id' => $deal->id,
                    'status' => $request->status,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];

                if ($request->status == $status) {
                    $total_days = DB::table('deals_status_history')->where('deal_id', $deal->id)->sum('status_days');
                    $data['status_days'] = $total_days;
                } else {
                    $data['status_days'] = 0;
                }

                DB::table('deals_status_history')->insert($data);
            }
        }
        // $deal_histid = DB::table('deals_status_history')->where('deal_id', $deal->id)->where('status', $request->status)->value('id');

        // if(!$deal_histid)
        // {
        //     $deal_time_exists = DB::table('deals_status_history')->where('deal_id', $deal->id)->orderby('created_at','desc')->value('created_at');

        //     $currdate = Carbon::parse(now());
        //     if ($deal_time_exists)
        //     {
        //         $predate = Carbon::parse($deal_time_exists);
        //         $days = $predate->diffInDays($currdate);
        //     }else{
        //         $predate = Carbon::parse($deal->created_at);
        //         $days = $predate->diffInDays($currdate);
        //     }
        //     if($days < 1)
        //     {
        //         $days = 1;
        //     }

        //     DB::table('deals_status_history')->insert(
        //         ['deal_id' => $deal->id,'status' => $request->status,'status_days' => $days,'created_at'=>now(),'updated_at'=>now()]
        //     );
        // }
    }

    public function show(Request $request)
    {
        $filter = 0;
        $status = $request->segment(3);

        $from_created_date = $request->from_created_date;
        $to_created_date = $request->to_created_date;
        $event_date = $request->event_date;
        $event_id = $request->event_id;
        $user_id = $request->user_id;
        $page = $request->page;

        if (!$from_created_date && !$to_created_date && !$event_date && !$event_id && !$user_id && $request->dealfilter == 'submitfilter') {
            $request->validate([
                'from_created_date' => 'required',
                'to_created_date' => 'required',
                'event_date' => 'required',
                'event_id' => 'required',
                'user_id' => 'required',
            ]);
        }
        if ($from_created_date || $to_created_date) {
            $request->validate([
                'from_created_date' => 'required',
                'to_created_date' => 'required',
            ]);
        }

        // $query = Deal::with(['enquiryOwner'])->select('deals.*', 'users.name', 'services.service_name', 'properties.property_title', 
        // 'contacts.first_name', 'contacts.last_name', 'contacts.email', 'contacts.phone', 'accounts.company_name')
        // ->leftjoin('users', 'users.id', '=', 'deals.assigned_to_user')
        // ->join('services', 'services.id', '=', 'deals.event_id')
        // ->join('properties', 'properties.id', '=', 'deals.venue')
        // ->join('contacts', 'contacts.id', '=', 'deals.contact_id')
        // ->join('accounts', 'accounts.id', '=', 'contacts.company_id');

        $query = Deal::with(['enquiryOwner'])->select('deals.*', 'services.service_name', 'accounts.company_name')
        ->join('services', 'services.id', '=', 'deals.event_id')
        ->join('contacts', 'contacts.id', '=', 'deals.contact_id')
        ->join('accounts', 'accounts.id', '=', 'contacts.company_id');

        if ($from_created_date && $to_created_date) {
            $query = $query->whereBetween(Deal::raw("(DATE_FORMAT(deals.created_at,'%Y-%m-%d'))"), [$from_created_date, $to_created_date]);
        }
        if ($event_date) {
            $datestr = explode('-', $event_date);
            $year = $datestr[0];
            $month = $datestr[1];
            $query = $query->whereMonth('deals.event_start_date', $month);
            $query = $query->whereYear('deals.event_start_date', $year);
            $query = $query->whereMonth('deals.event_end_date', $month);
            $query = $query->whereYear('deals.event_end_date', $year);
        }
        if ($event_id) {
            $query = $query->where('deals.event_id', '=', $event_id);
        }
        if ($user_id) {
            $query = $query->where('deals.assigned_to_user', '=', $user_id);
        }
        if ($from_created_date || $to_created_date || $event_date || $event_id || $user_id) {
            $filter = 1;
        }

        if ($status) {
            $query->where('deals.status', $status);
        }
        $deals = $query->orderBy('id', 'desc')->paginate(10);

        $users = User::get();
        $services = Services::get();
        return view('admin.deals.index', compact('deals', 'filter', 'users', 'services', 'status', 'page'));
    }
    public function offerletter(Request $request)
    {
        $deal_data = Deal::select('deals.*', 'properties.property_title')->join('properties', 'properties.id', '=', 'deals.venue')
            ->where('deals.id', $request->id)->first();

        $deal_ol_data = OfferLetter::where('deal_id', $request->id)->first();

        $room_plan = RoomOccupancyDetail::select(
            'enquiries.number_of_room_nights',
            'enquiries.applied_gst',
            'room_types.title',
            'room_occupancy_details.room_occupancy',
            'room_occupancy_details.room_charges',
            'room_occupancy_details.no_of_rooms',
            'room_occupancy_details.room_gst',
            'room_occupancy_details.tariff_of_room'
        )
            ->join('enquiries', 'enquiries.id', '=', 'room_occupancy_details.enquiry_id')
            ->join('room_types', 'room_types.id', '=', 'room_occupancy_details.room_type')
            ->where('room_occupancy_details.enquiry_id', $deal_data->enquiry_id)->get();

        $wo_data = WorkOrder::select('work_orders.*')->orderBy('id', 'asc')->where('deal_id', $request->id)->get();

        return view('admin.deals.offerletter', compact('deal_data', 'deal_ol_data', 'room_plan', 'wo_data'));
    }

    public function offerletter_update(Request $request)
    {
        DB::beginTransaction();

        $request->validate([
            'detail1' => 'required',
            'detail2' => 'required',
            'address' => 'required',
            'city' => 'required',
            'pincode' => ['required', 'numeric'],
        ]);

        try {
            $dealid = $request->id;
            $enqid = $request->enq_id;
            $detail1 = htmlentities($request->detail1);
            $detail2 = htmlentities($request->detail2);
            $created_by = auth()->user()->id;
            $address = $request->address;
            $city = $request->city;
            $pincode = $request->pincode;

            $deal_ol = OfferLetter::where('deal_id', $dealid)->value('id');
            if (!$deal_ol) {
                OfferLetter::insert(
                    [
                        'deal_id' => $dealid, 'enquiry_id' => $enqid, 'package_detail' => $detail1, 'meal_detail' => $detail2, 'created_by' => $created_by,
                        'address' => $address, 'city' => $city, 'pincode' => $pincode,
                        'created_at' => now(), 'updated_at' => now()
                    ]
                );
            } else {
                OfferLetter::where(['id' => $deal_ol])->update([
                    'package_detail' => $detail1, 'meal_detail' => $detail2, 'address' => $address, 'city' => $city, 'pincode' => $pincode,
                    'updated_at' => now()
                ]);
            }
            if ($request->action == 'savensendwo') {

                // send deal's offer letter related mail
                $flag = 'sendmail';
                $this->viewoffer($request, $flag);

                OfferLetter::where(['deal_id' => $dealid])->update(['wo_sent' => '1']);

                $message = 'Deal\'s Offer Letter has been saved and sent successfully !';
            } else {
                $message = 'Deal\'s Offer Letter has been saved successfully !';
            }
            DB::commit();
            return redirect()->route('panel.deals.index')->with('success', $message);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('panel.deals.offerletter', $dealid)->with('exceptionError', $e->getMessage())->withInput();
        }
    }

    public function workorder_update(Request $request)
    {
        $wo_id = $request->woid;
        $wo_status = $request->wostatus;
        WorkOrder::where(['id' => $wo_id])->update(['wo_status' => $wo_status, 'updated_at' => now()]);
        return redirect()->back()->with('success', 'Work Order status has been updated successfully.');
    }

    public function send_payment_link(Request $request)
    {
        $request->validate([
            'paymentlink' => 'required',
        ]);

        $dealid = $request->id;
        $created_by = auth()->user()->id;
        $payment_link = $request->paymentlink;
        $enquiryid = $request->enquiry_id;
        $emailid = $request->emailadd;
        $name = $request->username;

        $deal_wo = OfferLetter::where('deal_id', $dealid)->value('id');
        if (!$deal_wo) {
            OfferLetter::insert(
                [
                    'deal_id' => $dealid, 'enquiry_id' => $enquiryid, 'created_by' => $created_by, 'payment_link' => $payment_link,
                    'created_at' => now(), 'updated_at' => now()
                ]
            );
        } else {
            OfferLetter::where(['id' => $deal_wo])->update(['payment_link' => $payment_link, 'updated_at' => now()]);
        }

        $data["email"] = $emailid;
        $data["name"] = $name;
        $data["title"] = "Deal Payment Link";
        $data["body"] = "Payment Link : $payment_link";

        Mail::send('admin.deals.welcome', compact('data'), function ($message) use ($data) {
            $message->to($data["email"])
                ->subject($data["title"]);
        });

        $message = 'Deal\'s payment link has been sent successfully !';
        return redirect()->route('panel.deals.index')->with('success', $message);
    }

    public function viewoffer(Request $request, $flag = null)
    {
        $deal_data = Deal::select('deals.*', 'properties.property_title')->join('properties', 'properties.id', '=', 'deals.venue')
            ->where('deals.id', $request->id)->first();

        $deal_ol_data = OfferLetter::where('deal_id', $request->id)->first();

        $room_plan = RoomOccupancyDetail::select(
            'enquiries.number_of_room_nights',
            'enquiries.applied_gst',
            'room_types.title',
            'room_occupancy_details.room_occupancy',
            'room_occupancy_details.room_charges',
            'room_occupancy_details.no_of_rooms',
            'room_occupancy_details.room_gst',
            'room_occupancy_details.tariff_of_room'
        )
            ->join('enquiries', 'enquiries.id', '=', 'room_occupancy_details.enquiry_id')
            ->join('room_types', 'room_types.id', '=', 'room_occupancy_details.room_type')
            ->where('room_occupancy_details.enquiry_id', $deal_data->enquiry_id)->get();

        $pdf = PDF::loadView('admin.deals.viewofferpdf', compact('deal_data', 'deal_ol_data', 'room_plan'));

        if ($flag == 'sendmail') {
            $data["email"] = $deal_data->enquiry->email;
            // $data["email"] = "bijalwan.satish@gmail.com";
            $data["name"] = $deal_data->enquiry->firstname . ' ' . $deal_data->enquiry->lastname;
            $data["title"] = "Deal Offer Letter";
            $data["body"] = "We are glad to welcome you here. Please find the attached PDF file.";

            Mail::send('admin.deals.welcome', compact('data'), function ($message) use ($data, $pdf) {
                $message->to($data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "Offer_Letter_MiceHospitality.pdf");
            });
        } else {
            return $pdf->stream('Offer_Letter_MiceHospitality.pdf');
        }
    }
}
