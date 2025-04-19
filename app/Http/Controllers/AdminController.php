<?php

namespace App\Http\Controllers;

use App\Models\Categories;

use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin', [
            'users' => User::all(),
            'categories' => Categories::all(),
            'products' => Products::with('category')->get(),
            'orders' => Orders::with('user')->get(),
        ]);
    }
}
