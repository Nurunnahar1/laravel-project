<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    function Dashboard(){
        return view('admin.components.dashboard');
    }
    function loginPage(){

        return view('admin.components.login');
    }
    function forgetPasswordPage(){
        return view('admin.components.forget_password');
    }
}
