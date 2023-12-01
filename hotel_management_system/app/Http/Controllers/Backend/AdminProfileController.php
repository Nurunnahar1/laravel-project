<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    function profilePage(){
        return view('backend.components.profile');
    }
    function adminProfile(Request $request){
        $admin_data = Admin::where('email',Auth::guard('admin')->user()->email)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if($request->password!=''){
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password',
            ]);
            $admin_data->password = Hash::make($request->password);
        }
        // dd($admin_data);

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'image|mimes:png,jpg,jpeg,gif'
            ]);
            unlink(public_path('uploads/'.$admin_data->photo));
            $ext = $request->file('photo')->extension();
            $file_name = 'admin'.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$file_name);
            $admin_data->photo = $file_name;
        }

        // $admin_data->password = Hash::make($request->password);
        $admin_data->name = $request->name;
        $admin_data->email = $request->email;
        $admin_data->update();
        return redirect()->back()->with('success', 'Profile has been updated successfully.');
    }


    // function adminProfile(Request $request){
    //     $admin_data = Admin::where('email',Auth::guard('admin')->user()->email)->first();


    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email'
    //     ]);

    //     if($request->password!='') {
    //         $request->validate([
    //             'password' => 'required',
    //             'retype_password' => 'required|same:password'
    //         ]);
    //         $admin_data->password = Hash::make($request->password);
    //     }

    //     if($request->hasFile('photo')) {
    //         $request->validate([
    //             'photo' => 'image|mimes:jpg,jpeg,png,gif'
    //         ]);

    //         unlink(public_path('uploads/'.$admin_data->photo));

    //         $ext = $request->file('photo')->extension();
    //         $final_name = 'admin'.'.'.$ext;

    //         $request->file('photo')->move(public_path('uploads/'),$final_name);

    //         $admin_data->photo = $final_name;
    //     }


    //     $admin_data->name = $request->name;
    //     $admin_data->email = $request->email;
    //     $admin_data->update();

    //     return redirect()->back()->with('success', 'Profile information is saved successfully.');
    // }

}


