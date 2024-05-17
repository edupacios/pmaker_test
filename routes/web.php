<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('movies', ['uses' => MovieController::class, 'except' => ['destroy']]);