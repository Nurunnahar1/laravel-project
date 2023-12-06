<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    function index(){
        $privacy = Privacy::where('id',1)->first();
        return view('frontend.pages.privacy',compact('privacy'));
    }
}
