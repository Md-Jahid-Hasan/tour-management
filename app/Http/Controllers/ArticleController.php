<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        
    }

    public function create(){
        return view('form.add_article');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:20',
            'title' => 'required|max:50',
            'description' => 'required',
            'tag' => 'required|max:50'
        ]);

        Article::create([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'tag' => $request->tag
        ]);

        return back();
    }
}
