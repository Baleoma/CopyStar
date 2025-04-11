<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('about');
});

Route::get('/catalog', function () {
    return view('catalog');
});

Route::get('/where', function () {
    return view('where');
});
