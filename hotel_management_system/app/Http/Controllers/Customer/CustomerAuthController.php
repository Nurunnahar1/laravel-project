<?php

namespace App\Http\Controllers\Customer;

use App\Mail\CustomerMail;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    function loginPage(){
    return view('frontend.customer.login');
    }
    function signup(){
        return view('frontend.customer.signup');
    }



    function signupMethod(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required',
            'retype_password' => 'required|same:password',
         ]);
        $token = hash('sha256', time());
        $password = Hash::make($request->password);
        $verification_link = url('customer-verify/'.$request->email.'/'.$token);
        $obj = new Customer();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = $password;
        $obj->token = $token;
        $obj->save();

        //send email
        $message = 'Please click on this link: <br><a href="'.$verification_link.'">Click here</a>';
        // $message = 'Please click on the link below to verify your account<br>';
        // $message .= '<a href="' . $verification_link . '">';
        // $message .= $verification_link;
        // $message .= '</a>';
        \Mail::to($request->email)->send(new CustomerMail($message));

         return redirect()->back()->with('success', 'Complete signup,Please check your email and click on the link');
    }


    function customerVerify($email,$token){

    }

       function logout(){
       Auth::guard('customer')->logout();
       return redirect()->route('CustomerloginPage');
       }
}
