<?php

namespace App\Http\Controllers;

use App\Mail\ChangePassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendPasswordResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);
        
        $token = Controller::ImageStr(12);
        $getUser = User::where('email', $request->email)->first();
        $time = date('H:i:s');
        $expiration_time = date('H:i:s', strtotime('+5 minutes', strtotime($time)));

        if(!$getUser){
            return back()->with('UserNotExist', 'User does not exist in our db');
        }

        $getUser->update([
            'reset_token' => $token,
            'expiration' => $expiration_time
        ]);

        Mail::to($getUser->email)->send(new ChangePassword($token, $getUser->email));
        return back();
        
    }

    public function updatePass(Request $request)
    {
        return view('auth.update_password', [
            'token' => $request->token,
            'email' => $request->email
        ]);
    }

    public function storeUpdatePass(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8'
        ]);

        $getUser = User::where('email', $request->email)->first();
        $tokenExpireTime = $getUser->expiration;
        $currentTime = date('H:i:s');

        if(!($currentTime > $tokenExpireTime)){
            $updatePass = User::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);
            if($updatePass){
                return redirect(route('agent.login'))->with('PasswordResetSuccess', 'Password has been reset');
            }
        }
        
        return redirect(route('forgot-password'))->with('LinkExpired', 'Password reset link has expired, get a new one');
    }

    public function destroy(User $agent)
    {
        $agent->delete();
        return back();
    }

}
