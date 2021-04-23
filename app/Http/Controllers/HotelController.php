<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HotelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store', 'index']);
        $this->middleware(['hotel_owner'])->only(['hotel_room_add_form', 'hotel_room_add']);
    }

    public function index()
    {
        $place = Place::all();
        //Show Hotel Add Form
        return view('hotel.form.add_hotel', [
            'place' => $place
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:100',
            'place_id' => 'required',
            'description' => 'required'
        ]);

        //dd($request->user()->hotel());

        $request->user()->hotel()->create([
            'name' => $request->name,
            'place_id' => $request->place_id,
            'description' => $request->description,
            'rating' => 0
        ]);

        return redirect()->route('hotel.booking');
    }

    public function list_hotel(){
        $hotel = Hotel::all();
        return view('hotel.hotel_list', [
            'hotel' => $hotel
        ]);
    }

    public function hotel_room(Hotel $hotel){
       
        $room = $hotel->rooms()->get();
        $tag =Tag::all();
        $tag = Tag::whereHas('room', function($q) use($hotel){
            $q->where('hotel_id', $hotel->id);
        })->get();
        return view('hotel.hotel_room', [
            'room' => $room,
            'tags' => $tag
        ]);
    }

    public function hotel_room_byname(Request $request, Hotel $hotel){
        
        if($request->name <> 0){
            $room = Room::whereHas('tags', function($q) use($request){
                $q->where('tag_id', $request->name);
            })->where('hotel_id', $hotel->id)->get();
        }
         else{
            $room = $hotel->rooms()->get();
         }
        $tag =Tag::all();
        $tag = Tag::whereHas('room', function($q) use($hotel){
            $q->where('hotel_id', $hotel->id);
        })->get();
        // dd($t);
        return view('hotel.hotel_room', [
            'room' => $room,
            'tags' => $tag
        ]);
    }

    public function hotel_room_add_form(Hotel $hotel){
        if(!is_null($hotel->id)){
            dd($hotel->id);
        }
        $tag = Tag::all();
        return view('hotel.form.add_room',[
            'tag' => $tag
        ]);
    }

    public function hotel_room_add(Request $request){
       
        $this->validate($request, [
            'name' => 'required|max:100',
            'total_room' => 'required',
            'capacity' => 'required',
            'type' => 'required',
            'description' => 'required'
        ]);
        $hotel = $request->user()->hotel->rooms()->create([
            'name' => $request->name,
            'total_room' => $request->total_room,
            'capacity' => $request->capacity,
            'type' => $request->type,
            'description' => $request->description,
            'booking_room' => 0,
            'available_room' => 0
        ]);
        $hotel->tags()->sync($request->tag, false);
        return redirect()->back();
    }

    public function room_details(Room $room){
        $hotel = $room->hotel()->with('location')->get();

        //dd($hotel);
        return view('hotel.room_details', [
            'room' => $room,
            'hotel' => $hotel
        ]);
    }
}
