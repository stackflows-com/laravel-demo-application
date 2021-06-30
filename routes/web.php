<?php

use App\Http\Controllers\SignalController;
use App\Http\Controllers\UserTaskController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');

Route::get('/throw-signal', [SignalController::class, 'create'])->name('signals.create');
Route::post('/throw-signal', [SignalController::class, 'store'])->name('signals.store');

Route::get('/user-tasks', [UserTaskController::class, 'index'])->name('user_tasks.index');
