<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index(){
        $contact = Contact::where('id',1)->first();
        return view('frontend.pages.contact',compact('contact'));
    }
}

