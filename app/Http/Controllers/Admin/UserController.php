<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\CreatedByUser;
use App\Models\User;
use App\Models\UserVerify;
use App\Notifications\UserLoggedInDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use App\Rules\CheckOldPassword;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $roles;

    protected $USER;
    protected $USER_ID;

    public function __construct()
    {
        $this->roles = Role::get();

        $this->middleware(function ($request, $next) {
            $this->USER = Auth::user();
            $this->USER_ID = $this->USER->id ?? null;
            return $next($request);
        });
    }

    public function index()
    {
        abort_if(Gate::denies('user-management-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($this->USER->can('is-super-admin')) {
            $users = User::with('roles')->get();
        } else {
            if (auth()->user()->can('is_admin')) {
                $users = User::whereHas('roles', function ($query) {
                    $query->where('id', ">=", $this->USER->utype);
                })->where('id', '!=', $this->USER_ID)->get();
            } else {
                $users = User::wherehas('getAgentsBySuperVisor', function ($query) {
                    $query->where('created_by', $this->USER_ID);
                })->get();
            }
        }

        return view("admin.users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('user-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = $this->roles;
        return view("admin.users.create", compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $password = "admin";
            $data = $request->all();
            $data['name']  = $request->first_name . " " . $request->last_name;
            $data['password'] = Hash::make($password);
            //$data['utype'] = max($request->role);
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
                if (auth()->user()->can('is_admin')) {
                    $user->utype = $request->role;
                    $user->assignRole($request->role);
                } else {
                    $user->utype = 4;
                    $user->assignRole([4]);
                }
                $user->notify(new UserLoggedInDetails($str));
                $user->save();
                DB::commit();
                return back()->with('success', 'User created successfully.');
            } else {
                return back()->with('error', 'Something is problem.');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('panel.user-managment.create')->with('error', $e->getMessage())->withInput();
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
        abort_if(Gate::denies('user-show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('user-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = $this->roles;
        $user = User::with('roles')->find($id);
        return view("admin.users.edit", compact("roles", "user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        //dd($request->role);
        if ($user->save()) {
            $user->syncRoles($request->role);
            return back()->with('success', 'User updated successfully.');
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
        abort_if(Gate::denies('user-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::find($id);
        $user->delete();
        return back()->with('success', 'User Delete Successfully.');
    }
    public function showuserpassword()
    {
        return view("admin.user-changepassword");
    }

    public function updateuserpassword(Request $request)
    {
        $request->validate([
            'old_pass' => ['required', new CheckOldPassword()],
            'new_pass' => 'required|min:8',
            'confirm_new_pass' => 'same:new_pass'
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_pass)]);
        
        return back()->with('success', 'Password has been Changed successfully.');
    }
}
