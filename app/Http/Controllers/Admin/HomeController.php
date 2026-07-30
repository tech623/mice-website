<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $last_date = Carbon::today()->subDays(30);

        $inquiry = collect(Enquiry::DEAL_STATUS);
        $inquiryStatus = $inquiry->whereNotIn('id', [6, 7])->pluck('slug')->toArray();
        $deal = Deal::where('created_at', '>=', $last_date)->get();

        $open_or_close = Deal::where('created_at', '>=', $last_date)->whereIn('status', ['confirmed','lost'])->get();
        
        $tickets = array(
            'total' => $deal->count(),
            'in_progress' => $deal->whereIn('status', $inquiryStatus)->whereNotNull('assigned_to_user')->count(),
            'un_assigned' => $deal->whereNull('assigned_to_user')->count(),
            'open_or_close' => $open_or_close
        );
        
        $query1 = DB::table('deals_close_ageing')->selectRaw('ageing, ageing_colors, count(*) as count')
            // ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy('deals_close_ageing.ageing')
            ->groupBy('deals_close_ageing.ageing_colors')
            ->orderBy('deals_close_ageing.ageing', 'asc')
            ->get();

        $query2 = DB::table('test_view')->select('ageing','ageing_colors', DB::raw('count(DISTINCT assigned_to_user) as count'))
            // ->whereMonth('created_at', Carbon::now()->month)
            ->whereNotNull('test_view.assigned_to_user')
            ->groupBy('test_view.ageing')
            ->groupBy('test_view.ageing_colors')
            ->orderBy('ageing', 'asc')
            ->get();

        $query3 = DB::table('test_view')->select('ageing','ageing_colors', DB::raw('count(DISTINCT venue) as count'))
            // ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy('test_view.ageing')
            ->groupBy('test_view.ageing_colors')
            ->orderBy('ageing', 'asc')
            ->get();

        $query4 =  DB::table('test_view')->select('ageing','ageing_colors', DB::raw('count(DISTINCT event_id) as count'))
            // ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy('test_view.ageing')
            ->groupBy('test_view.ageing_colors')
            ->orderBy('ageing', 'asc')
            ->get();

        $query6 = DB::table('deals')->select('name', DB::raw('count(IF(`deals`.`assigned_to_user` is not null, 1, null)) as total_assigned, count(IF(`deals`.`status` !="confirmed" and `deals`.`status` !="lost" and `deals`.`assigned_to_user` is not null, 1, null)) as total_inprogress, count(IF(`deals`.`status` ="confirmed", 1, null)) as total_won, count(IF(`deals`.`status` ="lost", 1, null)) as total_lost'))
            ->join("users", "users.id", "=", "deals.assigned_to_user")
            ->where('deals.created_at', '>=', $last_date)
            ->groupBy(['assigned_to_user','name'])
            ->get();


        $query7 = DB::table('deals')->select('properties.property_title', DB::raw('count(*) as total, count(IF(`deals`.`assigned_to_user` is null, 1, null)) as total_un_assigned, count(IF(`deals`.`status` !="confirmed" and `deals`.`status` !="lost" and `deals`.`assigned_to_user` is not null, 1, null)) as total_inprogress, count(IF(`deals`.`status` ="confirmed", 1, null)) as total_won, count(IF(`deals`.`status` ="lost", 1, null)) as total_lost'))
            ->join("properties", "properties.id", "=", "deals.venue")
            ->where('deals.created_at', '>=', $last_date)
            ->groupBy('properties.property_title')
            ->get();

        $query8 = DB::table('deals')->select('service_name', DB::raw('count(*) as total, count(IF(`deals`.`assigned_to_user` is null, 1, null)) as total_un_assigned, count(IF(`deals`.`status` !="confirmed" and `deals`.`status` !="lost" and `deals`.`assigned_to_user` is not null, 1, null)) as total_inprogress, count(IF(`deals`.`status` ="confirmed", 1, null)) as total_won, count(IF(`deals`.`status` ="lost", 1, null)) as total_lost'))
            ->join("services", "services.id", "=", "deals.event_id")
            ->where('deals.created_at', '>=', $last_date)
            ->groupBy('service_name')
            ->get();

        $query9 = DB::table('deals')->select('location', DB::raw('count(*) as total, count(IF(`deals`.`assigned_to_user` is null, 1, null)) as total_un_assigned, count(IF(`deals`.`status` !="confirmed" and `deals`.`status` !="lost" and `deals`.`assigned_to_user` is not null, 1, null)) as total_inprogress, count(IF(`deals`.`status` ="confirmed", 1, null)) as total_won, count(IF(`deals`.`status` ="lost", 1, null)) as total_lost'))
            ->where('deals.created_at', '>=', $last_date)
            ->groupBy('location')
            ->get();

        $query10 = DB::table('deals')->select(DB::raw("DATE_FORMAT(created_at,'%m/%y') as date"), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get(); 

        $query11 = DB::table('deals')
            ->select(DB::raw('DATE(deals.created_at) as created_date'), DB::raw('COUNT(*) as counts'))
            ->groupBy('created_date')
            ->where('created_at', '>=', $last_date)
            ->orderBy('created_date', 'asc')
            ->get();

        // $query11 = DB::table('deals')->select(DB::raw("DATE_FORMAT(created_at,'%d') as date"), DB::raw('count(*) as count'))
        // ->whereMonth('created_at', Carbon::now()->month)
        // ->groupBy('date')
        // ->orderBy('date', 'asc')
        // ->get();

        return view('home', compact('tickets', 'query1', 'query2', 'query3', 'query4', 'query6', 'query7', 'query8', 'query9', 'query10', 'query11'));
    }
}
