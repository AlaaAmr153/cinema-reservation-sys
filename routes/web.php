<?php

use App\Http\Controllers\CinemaController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScreenController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\ShowTimeController;
use App\Models\Seat;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::controller(MovieController::class)->prefix('movies')->name('movies.')->group(function(){
        Route::get('/','index')->name('index');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::patch('update/{id}','update')->name('update');
        Route::delete('delete/{id}','delete')->name('delete');
    });

    Route::controller(ShowTimeController::class)->prefix('showtimes')->name('showtimes.')->group(function(){
        Route::get('/','index')->name('index');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::patch('update/{id}','update')->name('update');
        Route::delete('delete/{id}','delete')->name('delete');
        });

    Route::controller(SeatController::class)->prefix('seats')->name('seats.')->group(function(){
        Route::get('/','index')->name('index');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::patch('update/{id}','update')->name('update');
        Route::delete('delete/{id}','delete')->name('delete');
    });


    Route::controller(CinemaController::class)->prefix('cinemas')->name('cinemas.')->group(function(){
        Route::get('/','index')->name('index');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::patch('update/{id}','update')->name('update');
        Route::delete('delete/{id}','delete')->name('delete');
                });

    Route::controller(ScreenController::class)->prefix('screens')->name('screens.')->group(function(){
        Route::get('/','index')->name('index');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::patch('update/{id}','update')->name('update');
        Route::delete('delete/{id}','delete')->name('delete');
                });


    // Route::resource('movies',MovieController::class);
    // Route::resource('showtimes',ShowTimeController::class);
    // Route::resource('seats',SeatController::class);
    // Route::resource('cinemas',CinemaController::class);
    // Route::resource('screens',ScreenController::class);
});

require __DIR__.'/auth.php';
