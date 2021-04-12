<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index(Place $place) {
        $activities = $place->activites()->get();
        $packages = $place->packages()->where('start_date', '>', Carbon::now()->toDateString())->get();
        return view('place', [
            'activites'=>$activities,
            'packages'=>$packages,
            'place'=>$place
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'division' => 'required',
            'name'=>'required',
            'description'=>'required'
        ]);

        Place::create([
            'divison' => $request->division,
            'tourist_spot'=>$request->name,
            'description'=>$request->description
        ]);

        return back();
    }
}
