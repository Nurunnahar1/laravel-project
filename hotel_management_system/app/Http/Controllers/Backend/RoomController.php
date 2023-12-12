<?php

namespace App\Http\Controllers\Backend;

use App\Models\Amenities;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    function index(){
        $room = Room::latest()->paginate(10);
        return view('backend.pages.room.index',compact('room'));
    }
    function create(){
        $amenities = Amenities::get();
        return view('backend.pages.room.create',compact('amenities') );
    }
    function store(Request $request){

        $request->validate([

            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'amenities' => 'nullable',
            'total_rooms' => 'required',
            'room_size' => 'required',
            'total_beds' => 'required',
            'total_bathrooms' => 'required',
            'total_balconies' => 'required',
            'total_guests' => 'required',
            'featured_photo' => 'required|image|mimes:png,jpg,jpeg,gif,webp',
            'video_id' => 'required',

        ]);

        $amenities = '';
        $i=0;
        if(isset($request->arr_amenities)){
            foreach($request->arr_amenities as $item){
                if($i==0){
                    $amenities .= $item;
                }
                else{
                    $amenities .= ','.$item;
                }
                $i++;
            }
        }





        $ext = $request->file('featured_photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('featured_photo')->move(public_path('uploads/room'), $final_name);

        $room = new Room();

        $room->featured_photo = $final_name;
        $room->name = $request->name;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->amenities = $amenities;
        $room->total_rooms = $request->total_rooms;
        $room->room_size = $request->room_size;
        $room->total_beds = $request->total_beds;
        $room->total_bathrooms = $request->total_bathrooms;
        $room->total_balconies = $request->total_balconies;
        $room->total_guests = $request->total_guests;
        $room->video_id = $request->video_id;
        $room->save();

        return redirect()->route('room.page')->with('success', 'Room data create successfully');
    }

    // function editPage($id){
    //     $slide_data = Slide::where('id', $id)->first();
    //     return view('backend.pages.slide.edit',compact('slide_data'));
    // }

    // function update(Request $request,$id){
    //     // echo $id;
    //     $slide_data = Slide::where('id', $id)->first();

    //     if($request->hasFile('photo')){
    //         $request->validate([
    //             'photo' => 'image|mimes:jpg,jpeg,png,gif',
    //         ]);
    //         unlink(public_path('uploads/slide/'.$slide_data->photo));
    //         $ext = $request->file('photo')->extension();
    //         $final_name = time().'.'.$ext;
    //         $request->file('photo')->move(public_path('uploads/slide/'),$final_name);
    //         $slide_data->photo = $final_name;
    //     }

    //     $slide_data->heading = $request->heading;
    //     $slide_data->text = $request->text;
    //     $slide_data->button_text = $request->button_text;
    //     $slide_data->button_url = $request->button_url;
    //     $slide_data->update();

    //     return redirect()->route('slide.page')->with('success', 'Slide is update successfully.');
    // }

    // function destroy($id){
    //     $single_data = Slide::where('id', $id)->first();
    //     unlink(public_path('uploads/slide/'.$single_data->photo));
    //     $single_data->delete();
    //     return redirect()->route('slide.page')->with('success', 'Slide is Deleted successfully.');
    // }
}
