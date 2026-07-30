<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deal;
use Illuminate\Support\Facades\Auth;

class DealsTabFilterController extends Controller
{
    public function dealstatusdata(Request $request)
    {
        if ($request->flag == 'select') {
            //deal listing

            $reqevent = $request->event;
            $data = Deal::with(['enquiryOwner','enquiry'])->select('deals.*', 'users.name', 'services.service_name')->leftjoin('users', 'users.id', '=', 'deals.assigned_to_user')
                ->join('services', 'services.id', '=', 'deals.event_id')->where('deals.status', '=', $reqevent);

            if (Auth::user()->hasRole(4)) {
                $data->where('deals.assigned_to_user', Auth::user()->id);
            }

            $data = $data->orderBy('id', 'desc')->get();

            $response['data'] = $data;
            $response['check'] = 1;
            return response()->json($response);
        } elseif ($request->flag == 'delete') {
            //deal listing
            Deal::where('id', $request->event)->delete();
            redirect()->route('panel.deals.index')->with('success', 'Deal has been deleted successfully');
            $response['check'] = 2;
            return response()->json($response);
        } elseif ($request->flag == 'finddeal') {
            //inquiry listing
            $contvalue = Deal::where('enquiry_id', $request->event)->value('id');
            $response['dealid'] = $contvalue;
            return response()->json($response);
        }
    }
}
