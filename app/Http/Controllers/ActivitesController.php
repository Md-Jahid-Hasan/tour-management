<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Package;
use App\Models\Activites;
use Illuminate\Http\Request;

class ActivitesController extends Controller
{
    public function index(Activites $activity)
    {
        $packages = $activity->packages()->where('start_date', '>', Carbon::now()->toDateString())->get();
        //$lines = explode(".", $packages->description);
     
        return view('activity_details',[
            'activity'=> $activity,
            'packages'=>$packages
        ]);
    }
}
