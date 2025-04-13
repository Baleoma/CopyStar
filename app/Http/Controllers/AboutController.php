<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $products = Products::orderBy('created_at', 'desc')->take(5)->get();
        return view('about', compact('products'));
    }
}
