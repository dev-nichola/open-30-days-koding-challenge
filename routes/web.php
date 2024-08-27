<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/podium', function () {
    return view('podium');
})->name('podium');

Route::middleware('auth')->group(function () {
    // partial, some accessible by user some only admin
    Route::resource('/assignments', AssignmentController::class);
    Route::resource('/task', TaskController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
