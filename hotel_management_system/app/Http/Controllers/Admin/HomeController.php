<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    function loginPage(){
        $pass = Hash::make('1234');
        dd($pass);
        return view('admin.components.login');
    }
    function forgetPasswordPage(){
        return view('admin.components.forget_password');
    }
}
