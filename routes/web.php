<?php

use App\Http\Controllers\SignalController;
use App\Http\Controllers\UserTaskController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');

Route::middleware(['backofficeAuth'])->group(function () {
    Route::get('/throw-signal', [SignalController::class, 'create'])->name('signals.create');
    Route::post('/throw-signal', [SignalController::class, 'store'])->name('signals.store');

    Route::get('/user-tasks', [UserTaskController::class, 'index'])->name('user_tasks.index');
    Route::post('/user-tasks/{id}/complete', [UserTaskController::class, 'complete'])->name('user_tasks.complete');
    Route::post('/user-tasks/complete-all', [UserTaskController::class, 'completeAll'])
        ->name('user_tasks.complete_all');
});
