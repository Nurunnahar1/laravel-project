<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
   function index(){
    $features = Feature::latest()->paginate(10);
    return view('backend.pages.feature.index',compact('features'));
   }

   function create(){

    return view('backend.pages.feature.create' );
   }
   function store(Request $request){

    $request->validate([
        'icon' => 'required',
        'heading' => 'required'
    ]);

    $features = new Feature();
    $features->icon = $request->icon;
    $features->heading = $request->heading;
    $features->text = $request->text;
    $features->save();
    return redirect()->route('feature.page')->with('success', 'Feature data create successfully');
  }


  function editPage($id){
    $features = Feature::where('id', $id)->first();
    return view('backend.pages.feature.edit',compact('features'));
}

function update(Request $request,$id){
    $request->validate([
        'icon' => 'required',
        'heading' => 'required'
    ]);



    $features = Feature::where('id', $id)->first();
    $features->icon = $request->icon;
    $features->heading = $request->heading;
    $features->text = $request->text;
    $features->update();

    return redirect()->route('feature.page')->with('success', 'Feature is update successfully.');
}


function destroy($id){
    $single_data = Feature::where('id', $id)->first();

    $single_data->delete();
    return redirect()->route('feature.page')->with('success', 'Feature is Deleted successfully.');
}
}




