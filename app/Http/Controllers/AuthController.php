<?php

namespace App\Http\Controllers;

use App\Models\UserVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function verify_email($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        return view('auth.passwords.confirm', compact("verifyUser"));
    }

    public function store(Request $request, $token)
    {
        $request->validate([
            'password' => 'required'
        ]);

        $verifyUser = UserVerify::where('token', $token)->first();

        if(!empty($verifyUser)){
            $user = $verifyUser->user;
            if($user->is_verified){
                return back()->with('error', 'Your e-mail is already verified. You can now login.');
            }else{
                $user->is_verified = 1;
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect('/login');
            }
        }else{
            return back()->with('error', 'Something is problem.');
        }
    }
}
