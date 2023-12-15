<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{


        function loginPage(){
        return view('frontend.customer.login');
        }


    //    function login(Request $request){
    //    $request->validate([
    //    'email' => 'required|email',
    //    'password' => 'required',
    //    ]);

    //    $credential =[
    //    'email' => $request->email,
    //    'password' => $request->password
    //    ];
    //    if(Auth::guard('customer')->attempt($credential)){
    //    return redirect()->route('dashboard');
    //    }else{
    //    return redirect()->route('CustomerloginPage')->with('error', 'Information is not Correct');
    //    }
    //    }
    function signup(){
        return view('frontend.customer.signup');
    }
    //    function logout(){
    //    Auth::guard('customer')->logout();
    //    return redirect()->route('CustomerloginPage');
    //    }
}
