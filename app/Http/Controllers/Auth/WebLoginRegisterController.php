<?php

namespace App\Http\Controllers\Auth;

use App\Models\Enquiry;
use App\Models\Deal;
use App\Models\Services;
use App\Http\Controllers\Controller;
use App\Models\DealComment;
use App\Models\User;
use App\Models\WorkOrder;
use App\Rules\CheckOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WebLoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */

    protected $services;

    public function __construct()
    {
        $this->services = Services::getServices();
        $this->middleware('isLoggedIn');
    }

    public function profile(Request $request)
    {
        $currentUser = Auth::user();
        $enquiries = Deal::select('deals.*', 'users.name', 'services.service_name')->where('enquiries.created_by', $currentUser->id)
            ->join('enquiries', 'enquiries.id', '=', 'deals.enquiry_id')
            ->leftjoin('users', 'users.id', '=', 'deals.assigned_to_user')
            ->join('services', 'services.id', '=', 'deals.event_id')
            ->orderBy('id', 'desc')->get();

        return view('web-login.profile', compact('currentUser', 'enquiries'));
    }

    public function updatePersonalProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_number' => 'required|numeric|regex:/^[0-9]{10,15}$/',
            'city' => 'required',
            //'dob' => 'required',
            //'email' => "required|email|unique:users,id," . Auth::user()->id,
            // 'address' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $user = User::find(Auth::user()->id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->contact = $request->mobile_number;
            // $user->email = $request->email;
            //$user->dob = $request->dob;
            $user->city = $request->city;
            $user->address = $request->address;
            $user->save();

            DB::commit();

            return response()->json(['status' =>  true, 'message' => 'Personal details update successfully.']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }

    public function updateProfessionalProfile(Request $request)
    {
        $request->validate([
            'professional_city' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $user = User::find(Auth::user()->id);
            $user->designation = $request->designation;
            $user->department = $request->department;
            $user->city = $request->professional_city;
            $user->company_name = $request->company_name;
            $user->save();

            DB::commit();

            return response()->json(['status' =>  true, 'message' => 'Professional details updated successfully.']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }

    public function viewprofileinquiry(Request $request)
    {
        $enquiry = Deal::find($request->inqid);
        $comments = $enquiry->dealComment;
        $html = view('website.inquery', compact('enquiry', 'comments'))->render();

        return response()->json([
            'status' => true,
            'html' => $html,
            'message' => 'successfully.',
        ]);
    }

    public function updateuserpassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new CheckOldPassword()],
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'same:new_password'
        ]);
        DB::beginTransaction();
        try {

            User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

            DB::commit();

            return response()->json(['status' =>  true, 'message' => 'Password changes successfully.']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }

    public function addcomments(Request $request)
    {
        $id = Auth::user()->id;
        $comment = htmlentities($request->comment);
        $dealid = $request->dealid;
        DB::table('deal_comments')->insert(
            ['deal_id' => $dealid, 'comments' => $comment, 'posted_by' => $id, 'created_at' => now(), 'updated_at' => now()]
        );
        // $response['flag'] = '<div class="row mr-4"><div class="col-md-12">Comment Added Successfully ! <a href="javascript:void(0);" class="lead" 
        // onclick="deal_details('.$dealid.')" title="Back to Deal"><i class="fa fa-arrow-circle-left" style="float:right;"></i>
        // </a></div></div>';
        $comments = DealComment::where('deal_id', $dealid)->get();
        $html = view('web-login.deal-comments', compact('comments'))->render();
        return response()->json([
            'status' => true,
            'html' => $html,
            'message' => 'successfully.',
        ]);
    }

    public function add_workorder_files(Request $request)
    {
        $imagesdata = [];
        if ($request->totalImages > 0) {
            foreach ($request->images as $key => $image) {
                $imagename = 'wofile_' . time() . rand(1, 99) . '.' . $image->extension();
                $filepath = 'workorders/' . $imagename;
                $path = Storage::disk('s3')->put($filepath, file_get_contents($image), 'public');

                $img_url = 'https://d6z2xbkmha48l.cloudfront.net/' . $filepath;

                $imagesdata[]['name'] = $img_url;

                // Insert Files in work orders table
                WorkOrder::insert(
                    [
                        'deal_id' => $request->dealid, 'enquiry_id' => $request->enquiryid, 'file_url' => $img_url, 'created_at' => now(),
                        'updated_at' => now()
                    ]
                );
            }
        }

        if ($imagesdata) {
            return response()->json([
                'status' => true,
                'message' => 'Success! Files uploaded successfully.',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed! Files not uploaded.',
            ]);
        }
    }
}
