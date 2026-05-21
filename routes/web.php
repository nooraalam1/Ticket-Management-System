<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\TrainController;
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
    
    //station routes
    Route::group(['prefix'=>'station', 'as'=> 'station.'],function(){
        Route::get('/create',[StationController::class,'index'])->name('create');
        Route::post('/store',[StationController::class,'store'])->name('store');
        Route::get('/view',[StationController::class,'view'])->name('view');
        Route::get('/edit/{id}',[StationController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[StationController::class,'update'])->name('update');
        Route::get('/delete/{id}',[StationController::class,'delete'])->name('delete');
    });

    //train routes

    Route::group(['prefix'=>'train','as'=>'train.'],function(){
        Route::get('/create',[TrainController::class,'index'])->name('create');
        Route::post('/store',[TrainController::class,'store'])->name('store');
        Route::get('/view',[TrainController::class,'view'])->name('view');
        Route::get('/edit/{id}',[TrainController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[TrainController::class,'update'])->name('update');
        Route::get('/delete/{id}',[TrainController::class,'delete'])->name('delete');
    });

    //coaches route

    Route::group(['prefix'=>'coach','as'=>'coach.'],function(){
        Route::get('/create',[CoachController::class,'index'])->name('create');
        Route::post('/store',[CoachController::class,'store'])->name('store');
        Route::get('/view',[CoachController::class,'view'])->name('view');
        Route::get('/edit/{id}',[CoachController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[CoachController::class,'update'])->name('update');
        Route::get('/delete/{id}',[CoachController::class,'delete'])->name('delete');
    });

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
