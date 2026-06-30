<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\FareController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController\ContactController;
use App\Http\Controllers\UserController\DashboardController;
use App\Http\Controllers\UserController\TraininfoController;
use App\Http\Controllers\UserController\VerifyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

//Admin Routes

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        //station routes
        Route::group(['prefix' => 'station', 'as' => 'station.'], function () {
            Route::get('/create', [StationController::class, 'index'])->name('create');
            Route::post('/store', [StationController::class, 'store'])->name('store');
            Route::get('/view', [StationController::class, 'view'])->name('view');
            Route::get('/edit/{id}', [StationController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [StationController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [StationController::class, 'delete'])->name('delete');

            Route::post('/checkDuplicate',[StationController::class,'checkDuplicate'])->name('checkDuplicate');
        });

        //train routes

        Route::group(['prefix' => 'train', 'as' => 'train.'], function () {
            Route::get('/create', [TrainController::class, 'index'])->name('create');
            Route::post('/store', [TrainController::class, 'store'])->name('store');
            Route::get('/view', [TrainController::class, 'view'])->name('view');
            Route::get('/edit/{id}', [TrainController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [TrainController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [TrainController::class, 'delete'])->name('delete');

            Route::post('/checkDuplicate',[TrainController::class,'checkDuplicate'])->name('checkDuplicate');
        });

        //coaches route

        Route::group(['prefix' => 'coach', 'as' => 'coach.'], function () {
            Route::get('/create', [CoachController::class, 'index'])->name('create');
            Route::post('/store', [CoachController::class, 'store'])->name('store');
            Route::get('/view', [CoachController::class, 'view'])->name('view');
            Route::get('/edit/{id}', [CoachController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [CoachController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [CoachController::class, 'delete'])->name('delete');
        });

        //seats

        Route::group(['prefix' => 'seat', 'as' => 'seat.'], function () {
            Route::get('/create', [SeatController::class, 'index'])->name('create');
            Route::post('/store', [SeatController::class, 'store'])->name('store');
            Route::get('/view', [SeatController::class, 'view'])->name('view');
            Route::get('/edit/{id}', [SeatController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [SeatController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [SeatController::class, 'delete'])->name('delete');
        });

        //Routes

        Route::group(['prefix' => 'route', 'as' => 'route.'], function () {
            Route::get('/create', [RouteController::class, 'index'])->name('create');
            Route::post('/store', [RouteController::class, 'store'])->name('store');
            Route::get('/view', [RouteController::class, 'view'])->name('view');
            // Route::get('/edit/{id}',[RouteController::class,'edit'])->name('edit');
            // Route::put('/update/{id}',[RouteController::class,'update'])->name('update');
            // Route::get('/delete/{id}',[RouteController::class,'delete'])->name('delete');
        });

        //Trips

        Route::group(['prefix' => 'trip', 'as' => 'trip.'], function () {
            Route::get('/create', [TripController::class, 'index'])->name('create');
            // Route::post('/store',[TripController::class,'store'])->name('store');
            // Route::get('/view',[TripController::class,'view'])->name('view');
            // Route::get('/edit/{id}',[TripController::class,'edit'])->name('edit');
            // Route::put('/update/{id}',[TripController::class,'update'])->name('update');
            // Route::get('/delete/{id}',[TripController::class,'delete'])->name('delete');
        });
        //Fares

        Route::group(['prefix' => 'fare', 'as' => 'fare.'], function () {
            Route::get('/create', [FareController::class, 'index'])->name('create');
            // Route::post('/store',[FareController::class,'store'])->name('store');
            // Route::get('/view',[FareController::class,'view'])->name('view');
            // Route::get('/edit/{id}',[FareController::class,'edit'])->name('edit');
            // Route::put('/update/{id}',[FareController::class,'update'])->name('update');
            // Route::get('/delete/{id}',[FareController::class,'delete'])->name('delete');
        });
    });

//User Routes

Route::middleware(['auth', 'role:user'])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/train-info', [TraininfoController::class, 'index'])->name('traininfo');
        Route::get('/verify-ticket', [VerifyController::class, 'index'])->name('verifyticket');
        Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    });

//other ajax routes

Route::get('/train-name/{id}', [AjaxController::class, 'trainName'])->name('trainName');

//Common Routes

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
