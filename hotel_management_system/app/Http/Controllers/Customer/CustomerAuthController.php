<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use App\Mail\CustomerMail;
use Illuminate\Http\Request;
use App\Mail\Customer_reset_pass;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        $obj->status = 0;
        $obj->save();

        //send email
        $message = $verification_link;
        \Mail::to($request->email)->send(new CustomerMail($message));

         return redirect()->back()->with('success', 'Complete signup,Please check your email and click on the link');
    }
    function customerVerify($email,$token){
        $customer_data = Customer::where('email', $email)->where('token', $token)->first();
        if($customer_data){
            $customer_data->token = '';
            $customer_data->status = 1;
            $customer_data->update();

            return redirect()->route('CustomerloginPage')->with('success', 'Your subscription is verified
            successfully!');
        }
        else{
            return redirect()->route('CustomerloginPage');
        }
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
        if(Auth::guard('customer')->attempt($credential)){
            return redirect()->route('customer.home');
        }else{
            return redirect()->route('CustomerloginPage')->with('error', 'Information is not Correct');
        }
    }
    function logout(){
    Auth::guard('customer')->logout();
    return redirect()->route('CustomerloginPage');
    }
    function forgetPassPage(){
    return view('frontend.customer.forget_pass');
    }
    function forgetPass(Request $request){
        $request->validate([
        'email' => 'required|email',
        ]);
        $customer_data = Customer::where('email', $request->email)->first();
        if(!$customer_data){
        return redirect()->back()->with('error', 'Email address not found !!');
        }
        $token = Hash('sha256', time());
        $customer_data->token = $token;
        $customer_data->update();

        $reset_link = url('customer-reset-password/'.$token.'/'.$request->email);
        $message = $reset_link ;
        Mail::to($request->email)->send(new Customer_reset_pass($message));
        return redirect()->route('CustomerloginPage')->with('success', 'Please check on the following link to reset password');
    }

    function resetPassPage($token,$email){
        $customer_data = Customer::where('email', $email)->where('token', $token)->first();
        if(!$customer_data){
            return redirect()->route('CustomerloginPage');
        }
        return view('frontend.customer.reset_pass',compact('token','email'));
    }
    
        function resetPass(Request $request){
            $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
            ]);
            // dd($request->password);

            $customer_data = Customer::where('token',$request->token)->where('email',$request->email)->first();

            $customer_data->password = Hash::make($request->password);
            $customer_data->token = '';
            $customer_data->update();
            return redirect()->route('CustomerloginPage')->with('success', 'Password is reset successfully');
        }






}
