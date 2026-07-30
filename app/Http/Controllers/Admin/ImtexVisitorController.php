<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImtexRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ImtexVisitorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('imtex_visitors_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $imtex_visitors = ImtexRegistration::select('imtex_registrations.*', 'imtex_hotels.property_name')
        ->join('imtex_hotels', 'imtex_hotels.id', '=', 'imtex_registrations.hotel_id')
        ->whereIn('imtex_hotels.property_type',['windergy','imtex'])
        ->orderBy('id','desc')->get();
        return view('admin.imtex-visitor.index', compact('imtex_visitors'));
    }
}
