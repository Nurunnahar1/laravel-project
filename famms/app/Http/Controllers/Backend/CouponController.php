<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\StoreCouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    }
}
