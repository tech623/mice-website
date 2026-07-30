<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupervisorRequest;
use App\Http\Requests\UpdateSupervisorRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\CreatedByUser;
use App\Models\User;
use App\Models\UserVerify;
use App\Notifications\UserLoggedInDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
    
    public function index()
    {
        abort_if(Gate::denies('supervisor-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::whereHas('roles', function($query) {
            $query->whereName("Supervisor");
        })->get();

        return view("admin.supervisor.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('supervisor-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.supervisor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupervisorRequest $request)
    {
        $password = "admin";
        $data = $request->all();
        $data['name']  = $request->first_name . " " . $request->last_name;
        $data['password'] = Hash::make($password);
        $data['utype'] = 3;
        $user = User::create($data);
        if ($user) {

            $userDataArray = array();
            $userDataArray['user_id'] = $user->id;
            $userDataArray['created_by'] = $this->USER_ID;
            CreatedByUser::create($userDataArray);

            $str = Str::random(64);

            UserVerify::create([
                'user_id' => $user->id,
                'token'   => $str
            ]);

            $user->assignRole([3]);
            $user->notify(new UserLoggedInDetails($str));

            return back()->with('success', 'User created successfully.');
        } else {
            return back()->with('error', 'Something is problem.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('supervisor-show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('supervisor-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::find($id);
        return view("admin.supervisor.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupervisorRequest $request, $id)
    {
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->contact = $request->contact;

        if ($user->save()) {
            return back()->with('success', 'Supervisor updated successfully.');
        } else {
            return back()->with('error', 'Something is problem.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('supervisor-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::find($id);
        $user->delete();
        return back()->with('success', 'Supervisor Delete Successfully.');
    }
}
