<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Enquiry;
use App\Models\Services;
use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deal_report = '';
        $now = Carbon::now();
        $weekArray = array(
            $now->startOfWeek(Carbon::SUNDAY)->format('m/d/Y'),
            $now->endOfWeek(Carbon::SATURDAY)->format('m/d/Y'),
        );

        $query = Deal::select('deals.*', 'users.name', 'services.service_name', 'properties.property_title', 'contacts.first_name', 'contacts.last_name', 'contacts.email', 'accounts.company_name')
            ->leftjoin('users', 'users.id', '=', 'deals.assigned_to_user')
            ->join('services', 'services.id', '=', 'deals.event_id')->join('properties', 'properties.id', '=', 'deals.venue')
            ->join('contacts', 'contacts.id', '=', 'deals.contact_id')->join('accounts', 'accounts.id', '=', 'contacts.company_id');

        if (count($request->all()) >= 1) {
            if ($request->daterange) {
                
                $daterange = explode('-', $request->daterange);
                $weekArray = $daterange;
                $startDate = date("Y-m-d", strtotime(trim($daterange[0])));
                $endDate = date("Y-m-d", strtotime(trim($daterange[1])));

                $query = $query->whereBetween(Deal::raw("(DATE_FORMAT(deals.created_at,'%Y-%m-%d'))"), [$startDate, $endDate]);
            }
            if ($request->status) {
                $query = $query->where('deals.status', $request->status);
            }
            if ($request->source) {
                $query = $query->where('deals.source', $request->source);
            }
            if ($request->eventtype) {
                $query = $query->where('deals.event_id', $request->eventtype);
            }
            if ($request->user) {
                $query = $query->where('deals.assigned_to_user', $request->user);
            }
            if ($request->property) {
                $query = $query->where('deals.venue', $request->property);
            }
        } else {
            $query = $query->whereMonth('deals.created_at', $now->month);
        }

        $services = Services::orderByRaw('FIELD(service_name, "Conference Organizer", "Team Outing", "Banquets","FIT","ODC","Travel Planner","Wedding Planning","Event management")')->get();
        $users = User::whereHas('roles', function ($q) {
            $q->where('name', '!=', 'consumer');
        })->orderBy('name', 'asc')->get();
        $status = collect(Enquiry::DEAL_STATUS)->sortBy('status');

        $properties = Property::propertyList();
        $deal_report = $query->orderBy('deals.id', 'desc')->get();
        return view('admin.reports.index', compact('weekArray', 'deal_report', 'services', 'users', 'properties', 'status'));
    }
}
