<?php

use App\Http\Controllers\ProcessController;
use App\Http\Controllers\UserTaskController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');

Route::get('/process/form', [ProcessController::class, 'form'])->name('process.form');
Route::post('/process/start', [ProcessController::class, 'start'])->name('process.start');

Route::get('/user-tasks', [UserTaskController::class, 'index'])->name('user_tasks.index');
Route::post('/user-tasks/{id}/complete', [UserTaskController::class, 'complete'])->name('user_tasks.complete');
Route::post('/user-tasks/complete-all', [UserTaskController::class, 'completeAll'])
    ->name('user_tasks.complete_all');
