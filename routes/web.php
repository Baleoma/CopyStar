<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\AboutController;


Route::get('/', [AboutController::class, 'index']);

Route::get('/catalog', [CatalogController::class, 'index']);

Route::get('/where', function () {
    return view('where');
});
