<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PartnerRequestController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('partner-request-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partner_req = PartnerRequest::orderBy('id','desc')->paginate(10);
        return view('admin.partner-request.index', compact('partner_req'));
    }
}
