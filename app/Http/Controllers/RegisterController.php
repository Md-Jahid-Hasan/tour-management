<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout_user'
        ]);
    }

    public function index(){
        return view('registration');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:100',
            'username' => 'required|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|confirmed'
        ]);
        
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::attempt($request->only('email', 'password'));
        return redirect()->route('home');
    }

    public function login_index()
    {
        return view('login');
    }

    public function login_store(Request $request){
        $this->validate($request, [
            'email' => 'required|email|max:100',
            'password' => 'required'
        ]);

        Auth::attempt($request->only('email', 'password'));
        return redirect()->route('home');
    }

    public function logout_user(){
        Auth::logout();
        return redirect()->route('home');
    }
}
