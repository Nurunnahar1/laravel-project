<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function loginPage(){
        return view('admin.components.login');
    }
    function forgetPasswordPage(){
        return view('admin.components.forget_password');
    }
}
