<?php

use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    Inertia::render('Welcome');
})->middleware('guest');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('task.index');
    Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/task', [TaskController::class, 'store'])->name('task.store');
    // Route::patch('/task/{id}', [TaskController::class, 'update'])->name('task.update');
});

require __DIR__.'/auth.php';
