<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Категория удалена');
    }
}
