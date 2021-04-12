<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Package $package){
        
        $activies = $package->activites()->get();
        return view('package_registration', [
            'package'=>$package,
            'activites'=>$activies
        ]);
    }
}
