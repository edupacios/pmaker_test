<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::patch('/task/{id}', [TaskController::class, 'update'])->name('task.update')->middleware('auth:sanctum');
