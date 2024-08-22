<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{

    public function customShowLoginForm(){
        return view('custom-login');
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
            return redirect()->route('admin.posts.index');
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
