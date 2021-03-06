<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Guest;
use App\Models\Customer;
use App\Models\RoomNumber;
use Illuminate\Http\Request;

class RoomBooking extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['hotel_owner'])->except(['book_hotel', 'place_order']);
    }

    public function index(){
        $request = Request();
        
        $hotel = $request->user()->hotel;
       
        $room = $hotel->rooms()->with('room_number')->get();
        
        
        return view('hotel.room_number', [
            'room' => $room
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'number' => 'required|max:100',
            'room' => 'required',
        ]);

        RoomNumber::create([
            'room_id' => $request->room,
            'number' => $request->number
        ]);

        return redirect()->route('hotel.booking');
    }

    public function destroy_room_number(RoomNumber $room){
        //dd($room);
        $room->delete();
        return back();
    }

    public function book_hotel(Request $request,Room $room){
        $this->validate($request, [
            'in' => 'required',
            'out' => 'required',
        ]);

        $room_number = $room->room_number()
                            ->where('check_out', null)
                            ->orwhere('check_out', '<=', $request->in)->count();

        if($room_number <= 0){
            return back()->with('status', 'No Room Available');
        }
        
        return view('hotel.book', [
            'room' => $room,
            'check_in' => $request->in,
            'check_out' => $request->out
        ]);
    }

    public function place_order(Request $request, Room $room){
        $this->validate($request, [
            'check_in' => 'required',
            'check_out' => 'required',
            'name' => 'required',
            'number' => 'required'
        ]);

        $customer = $room->customer()->create([
            'name' => $request->name,
            'phone_number' => $request->number,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'user_id' => $request->user()->id,
        ]);
        return view('success');
    }

    public function search_hotel(Request $request){
        $this->validate($request, [
            'in' => 'required',
            'out' => 'required',
        ]);
        
        $rooms = Room::whereHas('room_number', function($q) use($request){
            $q->where('check_out', '<', $request->in)
            ->orWhere('check_out', null);
        })->get();

        return view('hotel.search_list', [
            'room' => $rooms
        ]);
    }

    public function customer_list(RoomNumber $room_number){
        $date = new Carbon;
        //dd($date);
        if($room_number->check_out >= $date){
            return back()->with('status', 'You cant add Guest righ now');
        }
        $room = $room_number->room()->get();
        $customer = Guest::where('room_given', false)
        ->where('room_id', $room[0]->id)                    
        ->get();
        
  
        return view('hotel.customer_list', [
            'customer' => $customer,
            'room_number' => $room_number
        ]);
    }

    public function room_provide_byadmin(Request $request){
           
            $customer = Guest::where('id', $request->customer);
            $room = RoomNumber::where('id', $request->room_number_id);

            
            $customer->update(['room_number_id'=>$request->room_number_id, 'room_given'=>true]);
            
            $room->update([
                'check_in'=>$customer->first()->check_in,
                'check_out'=>$customer->first()->check_out,]);
        return redirect()->route('hotel.booking');
    }

    public function removeGuest(RoomNumber $room_number){
        if($room_number->check_in == null)
            return back();
        //dd($room_number);
        $room_number->update([
            'check_in' => null,
            'check_out' => null
        ]);
        return back();
        
    }

}
