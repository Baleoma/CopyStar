<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Товар удален');
    }
}
