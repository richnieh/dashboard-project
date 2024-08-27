<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Mockery\Generator\StringManipulation\Pass\Pass;

class CustomLoginController extends Controller
{

    public function customShowLoginForm(){
        return view('custom-login');
    }

    public function customShowLink(){
        return view('customShowLinkForm');
    }

    public function customShowResetForm(Request $request, $token){
        $email = $request->query('email');
        return view('customPasswordReset',['mail'=>$email,'token'=>$token]);
    }
    public function customPasswordUpdate(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $status = Password::reset($request->only('token','email','password','password_confirmation'),
            function(User $user, $password){
                $user->forceFill(
                    ['password' => Hash::make($password)]
                )->setRememberToken(Str::random(40));
                $user->save();
            });
        if($status === Password::PASSWORD_RESET){
            return redirect()->route('custom.login')->with(['status'=>__($status)]);
        }else{
            return back()->withErrors(['email'=>__($status)]);
        }
    }
    public function customReset(Request $request){
        $request->validate([
            'email'=>'required|email'
        ]);
        $status = Password::sendResetLink($request->only('email'));

        if($status === Password::RESET_LINK_SENT){
            return back()->with(['status'=>__($status)]);
        } else {
            return back()->withErrors(['email'=>__($status)]);
        }
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ],$request->remember)){
            return redirect()->route('custom.link.request');
        }
        return redirect()->route('custom.login');
//        $user = User::find(41);
//        Auth::loginUsingId($user, 'true');
    }

    public function customlogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('custom.login');
    }


}
