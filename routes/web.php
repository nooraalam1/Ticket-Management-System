<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

//Admin Routes

Route::middleware(['auth', 'role:admin'])
->prefix('admin')
->group(function () {
    Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/stations/create',[StationController::class,'index'])->name('station.create');
});

//User Routes

Route::middleware(['auth', 'role:user'])
->group(function () {
    Route::get('/dashboard',[UserController::class,'index'])->name('dashboard');
});

//Common Routes

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
