<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\NoteController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');


Route::get('/', [NoteController::class, 'index'])->name('notes.index');
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');