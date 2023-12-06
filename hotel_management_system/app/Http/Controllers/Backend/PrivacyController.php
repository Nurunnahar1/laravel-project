<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    function editPage(){
        $privacy = Privacy::where('id',1)->first();
        return view('backend.pages.privacy.edit',compact('privacy'));
    }
    function update(Request $request){
        $privacy = Privacy::where('id',1)->first();
        $privacy->heading = $request->heading;
        $privacy->content = $request->content;
        $privacy->update();
        return redirect()->back()->with('success','Privacy data updated successfully');
    }
}
