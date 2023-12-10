<?php

namespace App\Http\Controllers\Backend;

use App\Models\Amenities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AmenitiesController extends Controller
{
    function index(){
        $amenities = Amenities::get();
        return view('backend.pages.amenities.index',compact('amenities'));
    }
    function create(){
        return view('backend.pages.amenities.create' );
    }
    function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        $amenities = new Amenities();
        $amenities->name = $request->name;
        $amenities->save();
        return redirect()->route('amenities.page')->with('success', 'Amenities data create successfully');
    }
    function editPage($id){
        $amenities = Amenities::where('id', $id)->first();
        return view('backend.pages.amenities.edit',compact('amenities'));
    }
    function update(Request $request,$id){
        $faqs = Amenities::where('id', $id)->first();
        $request->validate([
            'name' => 'required',
        ]);
        $faqs->name = $request->name;
        $faqs->update();
        return redirect()->route('amenities.page')->with('success', 'Amenities is update successfully.');
    }

    function destroy($id){
        $single_data = Amenities::where('id', $id)->first();
        $single_data->delete();
        return redirect()->route('amenities.page')->with('success', 'Amenities is Deleted successfully.');
    }

}
