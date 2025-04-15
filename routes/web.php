<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;


Route::get('/', [AboutController::class, 'index']);

Route::get('/catalog', [CatalogController::class, 'index']);

Route::get('/where', function () {
    return view('where');
});

Route::get('/register', [AuthController::class, 'registerindex']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginindex']);
Route::post('/login', [AuthController::class, 'login']);
