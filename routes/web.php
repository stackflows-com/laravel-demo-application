<?php

use App\Http\Controllers\ProcessController;
use App\Http\Controllers\UserTaskController;
use App\Http\Controllers\VariableController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');

Route::get('/process/form', [ProcessController::class, 'form'])->name('process.form');
Route::post('/process/start', [ProcessController::class, 'start'])->name('process.start');

Route::get('/user-tasks', [UserTaskController::class, 'index'])->name('user_tasks.index');
Route::post('/user-tasks/{id}/complete', [UserTaskController::class, 'complete'])->name('user_tasks.complete');
Route::post('/user-tasks/complete-all', [UserTaskController::class, 'completeAll'])
    ->name('user_tasks.complete_all');

Route::get('/variables', [VariableController::class, 'index'])->name('variables.index');
Route::get('/variables/create', [VariableController::class, 'create'])->name('variables.create');
Route::post('/variables', [VariableController::class, 'store'])->name('variables.store');
Route::get('/variables/{id}', [VariableController::class, 'edit'])->name('variables.edit');
Route::put('/variables/{id}', [VariableController::class, 'update'])->name('variables.update');
Route::delete('/variables/{id}', [VariableController::class, 'destroy'])->name('variables.destroy');
