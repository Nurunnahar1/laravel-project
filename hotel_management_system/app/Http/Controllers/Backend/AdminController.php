<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use App\Mail\AdminMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    function dashboard(){
        return view('backend.components.dashboard');
    }
    function loginPage(){
        return view('backend.components.login');
    }
    function forgetPassPage(){
        return view('backend.components.forget_pass');
    }
    function login(Request $request){
        $request->validate([
             'email' => 'required|email',
             'password' => 'required',
        ]);

        $credential =[
             'email' => $request->email,
             'password' => $request->password
        ];
        if(Auth::guard('admin')->attempt($credential)){
             return redirect()->route('dashboard');
        }else{
             return redirect()->route('loginPage')->with('error', 'Information is not Correct');
        }
    }
      function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    function forgetPass(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        $admin_data = Admin::where('email', $request->email)->first();
        if(!$admin_data){
            return redirect()->back()->with('error', 'Email address not found !!');
        }
        $token = Hash('sha256', time());
        $admin_data->token = $token;
        $admin_data->update();

        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
        $message = $reset_link ;
        Mail::to($request->email)->send(new AdminMail($message));
        return redirect()->route('loginPage')->with('success', 'Please check your email and follow the steps');
    }


    function resetPassPage($token,$email){
        $admin_data = Admin::where('email', $email)->where('token', $token)->first();
        if(!$admin_data){
           return redirect()->route('loginPage');
        }
        return view('backend.components.reset_pass',compact('token','email'));
   }


   function resetPass(Request $request){
    $request->validate([
        'password' => 'required',
        'retype_password' => 'required|same:password'
    ]);

    $admin_data = Admin::where('token',$request->token)->where('email',$request->email)->first();

    $admin_data->password = Hash::make($request->password);
    $admin_data->token = '';
    $admin_data->update();
    return redirect()->route('loginPage')->with('success', 'Password is reset successfully');
}



}
