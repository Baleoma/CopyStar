<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $products = new Products();
        return view('catalog', ['products' => $products->all()]);
    }
}
