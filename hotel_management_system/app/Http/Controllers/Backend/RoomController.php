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

    function editPage($id){
        $amenities = Amenities::get();
        $room_data = Room::where('id', $id)->first();

        $existing_amenities = array();
        if($room_data->amenities !=''){
            $existing_amenities = explode(',',$room_data->amenities);
        }
        return view('backend.pages.room.edit',compact('room_data','amenities','existing_amenities'));
    }



    function update(Request $request,$id){
        // echo $id;
            $room_data = Room::where('id', $id)->first();

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
                'video_id' => 'required',
            ]);


            if($request->hasFile('featured_photo')){
                $request->validate([
                    'featured_photo' => 'required|image|mimes:png,jpg,jpeg,gif,webp'
                ]);
                unlink(public_path('uploads/room/'.$room_data->featured_photo));
                $ext = $request->file('featured_photo')->extension();
                $final_name = time().'.'.$ext;
                $request->file('featured_photo')->move(public_path('uploads/room/'),$final_name);
                $room_data->featured_photo = $final_name;
            }

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




            $room_data->name = $request->name;
            $room_data->description = $request->description;
            $room_data->price = $request->price;
            $room_data->amenities = $amenities;
            $room_data->total_rooms = $request->total_rooms;
            $room_data->room_size = $request->room_size;
            $room_data->total_beds = $request->total_beds;
            $room_data->total_bathrooms = $request->total_bathrooms;
            $room_data->total_balconies = $request->total_balconies;
            $room_data->total_guests = $request->total_guests;
            $room_data->video_id = $request->video_id;
            $room_data->update();

            return redirect()->route('room.page')->with('success', 'Room is update successfully.');
    }

    // function destroy($id){
    //     $single_data = Slide::where('id', $id)->first();
    //     unlink(public_path('uploads/slide/'.$single_data->photo));
    //     $single_data->delete();
    //     return redirect()->route('slide.page')->with('success', 'Slide is Deleted successfully.');
    // }
}
