<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\SubscriberMail;
use App\Models\Subscriber;
use Mail;
use Validator;
use App\Models\Admin;
use App\Mail\AdminMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    function sendEmail(Request $request){
        $validator = Validator::make($request->all(),[
             'email' => 'required|email',
        ]);
        if(!$validator->passes()){
            return response()->json(['code' =>0, 'error_message' =>$validator->errors()->toArray()]);
        }
        else{
            $token = hash('sha256',time());
            $obj = new Subscriber();
            $obj->email = $request->email;
            $obj->token = $token;
            $obj->status = 0;
            $obj->save();

            $verification_link = url('subscriber-verify/'.$request->email.'/'.$token);

            $message = "Please click on the link below to confirm subscription:<br>";
            $message .= '<a href="">';
            $message .= $verification_link;
            $message .= '</a>';


            Mail::to($request->email)->send(new SubscriberMail($message));
            return response()->json(['code' =>1, 'success_message' =>'Email sent successfully']);
        }
    }

    function verify($email, $token){
        $subscriber_data = Subscriber::where('email', $email)->where('token', $token)->first();

        if($subscriber_data){
            $subscriber_data->token = '';
            $subscriber_data->status = 1;
            $subscriber_data->update();
            return redirect()->route('home')->with('success_message', 'Your subscription has been verified successfully');
        }else{
            return redirect()->route('home');
        }
    }
}
