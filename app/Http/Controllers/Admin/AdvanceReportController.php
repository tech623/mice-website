<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AdvanceReportController extends Controller
{
    public function index(Request $request)
    {
        
        abort_if(Gate::denies('advance_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deal_advance_report = '';
        $filter = 0;
        $from_created_date = $request->from_created_date;
        //$to_created_date = $request->to_created_date;
        $user_id = $request->user_id;

        if (!$from_created_date && !$user_id && $request->adv_search == 'Submit') 
        {
            $request->validate([
                'from_created_date' => 'required',
                'user_id' => 'required',
            ]);
        }
        if ($from_created_date) 
        {
            $request->validate([
                'from_created_date' => 'required',
                //'to_created_date' => 'required',
            ]);
        }

        $deal_advance_report = Deal::select(Deal::raw('count(*) as count'), Deal::raw('(sum(deals.total_cost)) as total_cost'), 
        Deal::raw('(sum(deals.mice_revenue)) as mice_revenue'), 'users.name')
        ->join('users', 'users.id', '=', 'deals.assigned_to_user');

        if ($user_id) 
        {
            $deal_advance_report = $deal_advance_report->where('deals.assigned_to_user', '=', $user_id);
        }

        if ($from_created_date) 
        {
            $from_created_date =explode('-',$from_created_date);
            $year = $from_created_date[0];
            $month = $from_created_date[1];
            
            $deal_advance_report = $deal_advance_report->whereYear('deals.event_end_date', $year);
            $deal_advance_report = $deal_advance_report->whereMonth('deals.event_end_date', $month);

            // $deal_advance_report = $deal_advance_report->orWhereYear('deals.event_date', $year);
            // $deal_advance_report = $deal_advance_report->orWhereMonth('deals.event_date', $month);
            
        }

        $deal_advance_report = $deal_advance_report->groupBy('users.name');
        $deal_advance_report = $deal_advance_report->get();

        $users = User::orderBy('name', 'asc')->get();

        return view('admin.advance-report.index', compact('deal_advance_report', 'users', 'filter'));
    }
}
