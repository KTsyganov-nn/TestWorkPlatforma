<?php

use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::resource('/task', TaskController::class);
    Route::get('/task/{task}/getTask', [TaskController::class, 'getTask'])->name('task.getTask');
    Route::get('/task/{task}/cancelTask', [TaskController::class, 'cancelTask'])->name('task.cancelTask');
    Route::get('/task/{task}/successTask', [TaskController::class, 'SuccessTask'])->name('task.successTask');
    Route::get('/task/{user}/showTasks', [TaskController::class, 'showTasks'])->name('task.showTasks');
});
