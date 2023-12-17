<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    function cartPage(){
        return view('frontend.pages.cart');
    }
    function cartMethod(Request $request){
        $request->validate([
            'room_id' => 'required',
            'checkin_checkout' => 'required',
            'adult' => 'required',
        ]);

        $dates = explode('-', $request->checkin_checkout);
        $checkin_date = $dates[0];
        $checkout_date = $dates[1];

        session()->push('cart_room_id', $request->room_id);
        session()->push('cart_checkin_date', $checkin_date);
        session()->push('cart_checkout_date', $checkout_date);
        session()->push('cart_adult', $request->adult);
        session()->push('cart_children', $request->children);

        return redirect()->back()->with('success', 'Room is added to the cart successffully.');
    }
}
