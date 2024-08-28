<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Masmerise\Toaster\Toaster;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    // partial, some accessible by user some only admin
    Route::resource('/assignments', AssignmentController::class)->except(['create', 'edit','update']);
    Route::resource('/task', TaskController::class);

    Route::get('/podium', function () {
        return view('podium');
    })->name('podium');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Helper Migrate Biar Ga Report Import DB
    Route::get('/setup', function() {
        Artisan::call('migrate:fresh --seed');

        Toaster::success('Sukses Bro Sukses');

        return redirect('/');
    })->middleware('role:admin');
});

require __DIR__ . '/auth.php';
