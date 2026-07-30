<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PmtxRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PmtxVisitorController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('imtex_visitors_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pmtx_visitors = PmtxRegistration::select('pmtx_registrations.*', 'pmtx_hotels.property_name')
        ->join('pmtx_hotels', 'pmtx_hotels.id', '=', 'pmtx_registrations.hotel_id')
        ->orderBy('id','desc')->get();
        return view('admin.pmtx-visitor.index', compact('pmtx_visitors'));
    }
}
