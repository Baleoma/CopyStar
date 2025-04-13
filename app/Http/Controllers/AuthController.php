<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerindex(Request $request){
        return view('registration');
    }

    public function loginindex(Request $request){
        return view('login');
    }
}
