<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Place;
use App\Models\Article;
use App\Models\Package;
use App\Models\Activites;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $places = Place::take(4)->get();
        $activites = Activites::take(4)->get();
        $packages = Package::take(3)->where('start_date', '>', Carbon::now()->toDateString())->get();
        $article = Article::take(5)->get();
        
        return view('welcome', [
            'places' => $places,
            'activites' => $activites,
            'packages' => $packages,
            'articles' => $article
        ]);
    }
}
