<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;

Route::patch('/task/{id}', [TaskController::class, 'update'])->name('task.update')->middleware('auth:sanctum');
