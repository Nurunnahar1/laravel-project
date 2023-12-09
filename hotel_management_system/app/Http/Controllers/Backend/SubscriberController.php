<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\SubscriberMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    function showSubscriber(){
        $subscribers = Subscriber::where('status', 1)->get();
        return view('backend.components.subscriber',compact('subscribers'));
    }


    function sendEmailSubscriber(){

        return view('backend.components.subscriber_send_email');
    }
    function sendEmailSubmit(Request $request){

        $request->validate([
            // 'subject' =>'required',
            'message' =>'required'
        ]);
        // $subject = $request->subject;
        $message = $request->message;
        $all_subscriber = Subscriber::where('status', 1)->get();
        foreach($all_subscriber as $item){

            \Mail::to($item->email)->send(new SubscriberMail( $message));
        }
        return redirect()->back()->with('success', 'Email is send successfully.');

    }
}
