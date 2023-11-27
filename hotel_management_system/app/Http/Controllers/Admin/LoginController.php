<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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
}
