<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\AdminMail;
use App\Models\Admin;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    function index(){
        $contact = Contact::where('id',1)->first();
        return view('frontend.pages.contact',compact('contact'));
    }
    function sendEmail(Request $request){
        $validator = \Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        if(!$validator->passes()){
            return response()->json(['code' =>0, 'error_message' =>$validator->errors()->toArray()]);
        }
        else{
            $message = "Visitor sent email:<br>";
            $message = "<br>Name: ".$request->name;
            $message = "<br>Email: ".$request->email;
            $message = "<br>Message: ".$request->message;

            $admin_data = Admin::where('id',1)->first();
            $admin_email = $admin_data->email;
            // \Mail::to($admin_email)->send(new ContactMail($message));
            \Mail::to($admin_email)->send(new AdminMail($message));
            return response()->json(['code' =>1, 'success_message' =>'Email sent successfully']);
        }
    }
}

