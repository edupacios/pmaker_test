<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    Inertia::render('Welcome');
})->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('task.index');
    Route::patch('/task/{id}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/task', [TaskController::class, 'destroy'])->name('task.destroy');
});

require __DIR__.'/auth.php';
