<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Mail\AdminMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{

    function loginPage(){

        return view('admin.components.login');
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
             return redirect()->route('admin.dashboard');
        }else{
             return redirect()->route('admin.login')->with('error', 'Information is not Correct');
        }
      }




function logout(){
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login');
}

function forgetPasswordPage(){
    return view('admin.components.forget_password');
}
 function forgetPassword(Request $request){
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
        $message = 'Please click on this link: <br><a href="'.$reset_link.'">Click here</a>';
        Mail::to($request->email)->send(new AdminMail($message));
        return redirect()->route('admin.login')->with('success', 'Please check your email and follow the steps');

}

function resetPasswordPage($token,$email){
     $admin_data = Admin::where('email', $email)->where('token', $token)->first();
     if(!$admin_data){
        return redirect()->route('admin.login');
     }
     return view('admin.components.reset_password',compact('token','email'));
}

function resetPassword(Request $request){
    $request->validate([
        'password' => 'required',
        'retype_password' => 'required|same:password'
    ]);

    $admin_data = Admin::where('token',$request->token)->where('email',$request->email)->first();

    $admin_data->password = Hash::make($request->password);
    $admin_data->token = '';
    $admin_data->update();
    return redirect()->route('admin.login')->with('success', 'Password is reset successfully');
}

}
