<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerProfileController extends Controller
{

    function index(){
        return view('customer.components.dashboard');
    }
    function profile(){
        return view('frontend.customer.customer_profile');
    }


       function profileMethod(Request $request){
        $customer_data = Customer::where('email',Auth::guard('customer')->user()->email)->first();

        $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        ]);

        if($request->password!=''){
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);
        $customer_data->password = Hash::make($request->password);
        }


        if($request->hasFile('photo')){
        $request->validate([
        'photo' => 'image|mimes:png,jpg,jpeg,gif'
        ]);

        if($customer_data->photo != null){
            unlink(public_path('uploads/customer_photo/'.$customer_data->photo));
        }


        $ext = $request->file('photo')->extension();
        $file_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/customer_photo/'),$file_name);
        $customer_data->photo = $file_name;
        }

        // $customer_data->password = Hash::make($request->password);
        $customer_data->name = $request->name;
        $customer_data->email = $request->email;
        $customer_data->phone = $request->phone;
        $customer_data->country = $request->country;
        $customer_data->address = $request->address;
        $customer_data->state = $request->state;
        $customer_data->city = $request->city;
        $customer_data->zip = $request->zip;
        $customer_data->update();
        return redirect()->back()->with('success', 'Profile has been updated successfully.');
       }
}
