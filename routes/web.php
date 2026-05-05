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
    Route::get('/station/create',[StationController::class,'index'])->name('station.create');
    Route::post('/station/store',[StationController::class,'store'])->name('station.store');
    Route::get('/station/view',[StationController::class,'view'])->name('station.view');
    Route::get('/station/edit/{id}',[StationController::class,'edit'])->name('station.edit');
    Route::put('/station/update/{id}',[StationController::class,'update'])->name('station.update');
    Route::get('/station/delete/{id}',[StationController::class,'delete'])->name('station.delete');
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
