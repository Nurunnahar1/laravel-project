<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // function redirect(){
    //     $userType = Auth::user()->user_type;
    //     if($userType == "1"){
    //         return view("backend.layout.app");

    //     }else{
    //         return view("frontend.layout.app");
    //     }
    // }

    public function redirect()
    {

        if (Auth::check()) {
            $userType = Auth::user()->user_type;
 

            if ($userType == "1") {
                return view("backend.layout.app");
            } else {
                return view("frontend.layout.app");
            }
        } else {

            return redirect()->route('login');
        }
    }








}
