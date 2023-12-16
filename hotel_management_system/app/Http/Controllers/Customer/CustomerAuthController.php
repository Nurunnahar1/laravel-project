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
}
