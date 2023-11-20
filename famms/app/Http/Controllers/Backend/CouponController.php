<?php

namespace App\Http\Controllers\Backend;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreCouponRequest;

class CouponController extends Controller
{
    function CouponList(){
        $coupons =Coupon::latest('id')->paginate();
        return view('backend.pages.coupon.list',compact('coupons'));
    }

    function CouponCreate(){
        return view('backend.pages.coupon.create');
    }
    function CouponStore(StoreCouponRequest $request){
        // dd($request->all());
        Coupon::create([
            'coupon_name'=>$request->coupon_name,
            'discount_amount'=>$request->discount_amount,
            'minimum_purchese_amount'=>$request->minimum_purchese_amount,
            'validity_till'=>$request->validity_till

        ]);
        Session::flash('msg','Coupon created successfully');
        return redirect()->route('coupon.list');
    }

    function CouponEdit($id){
        $coupon = Coupon::find($id);
        return view('backend.pages.coupon.edit',compact('coupon'));
    }

function CouponDestroy($id){
    $coupon = Coupon::find($id)->delete();
    Session::flash('msg','Coupon deleted successfully');
    return redirect()->route('coupon.list');

}
}
