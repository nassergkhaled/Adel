<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    
    public function dashboard(){
        return view('dashboard');
    }
    public function profile(){
        return view('profile.show');
    }
}
