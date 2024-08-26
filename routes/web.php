<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/podium', function() {
    return view('podium');
})->name('podium');

Route::get('task', [TaskController::class, 'index'])->name('task.index');
Route::get('task/create', [TaskController::class, 'create'])->name('task.create');
Route::post('task/store', [TaskController::class, 'store'])->name('task.store');
Route::get('task/show/{id}', [TaskController::class, 'show'])->name('task.show');
Route::delete('task/destroy/{id}', [TaskController::class, 'destroy'])->name('task.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
