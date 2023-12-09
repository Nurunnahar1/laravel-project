<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    function showSubscriber(){
        $subscribers = Subscriber::where('status', 1)->get();
        return view('backend.components.subscriber',compact('subscribers'));
    }
}
