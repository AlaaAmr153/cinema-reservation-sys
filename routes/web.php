<?php

use App\Http\Controllers\CinemaController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieImageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScreenController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\ShowTimeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientHomeController;
use App\Http\Controllers\MovieInfoController;
use App\Http\Controllers\ReservationController;
use App\Models\Payment;
use App\Models\Seat;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 'role:admin'

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::controller(UserController::class)->prefix('admins')->name('admins.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('update/{id}', 'update')->name('update');
        Route::delete('delete/{id}', 'destroy')->name('destroy');
    });

    Route::controller(MovieController::class)->prefix('movies')->name('movies.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('update/{id}', 'update')->name('update');
        Route::delete('delete/{id}', 'delete')->name('delete');
        Route::get('/{id}/images', 'showImages')->name('images');
    });

    Route::controller(ShowTimeController::class)->prefix('showtimes')->name('showtimes.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('update/{id}', 'update')->name('update');
        Route::delete('delete/{id}', 'destroy')->name('destroy');
        Route::get('/cinemas/{cinemaId}/screens', [CinemaController::class, 'getScreens']);
    });


    Route::controller(SeatController::class)->prefix('seats')->name('seats.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('update/{id}', 'update')->name('update');
        Route::delete('delete/{id}', 'delete')->name('delete');
    });



    Route::controller(ShowTimeController::class)->prefix('showtimes')->name('showtimes.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('update/{id}', 'update')->name('update');
        Route::delete('desttroy/{id}', 'destroy')->name('destroy');
    });



    Route::controller(CinemaController::class)->prefix('cinemas')->name('cinemas.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('update/{id}', 'update')->name('update');
        Route::delete('delete/{id}', 'delete')->name('delete');
    });
    Route::get('/cinemas/{cinemaId}/screens', action: [CinemaController::class, 'getScreens']);



    Route::controller(ScreenController::class)->prefix('screens')->name('screens.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('update/{id}', 'update')->name('update');
        Route::delete('delete/{id}', 'delete')->name('delete');
    });

    Route::post('/movies/{id}/images', [MovieImageController::class, 'store'])->name('movie_images.store');
    Route::delete('/movie_images/{id}', [MovieImageController::class, 'destroy'])->name('movie_images.destroy');




    // Route::controller(PaymentController::class)->prefix('payments')->name('payments.')->group(function () {
    //     Route::get('/', 'index')->name('index');
    //     Route::get('create', 'create')->name('create');
    //     Route::post('store', 'store')->name('store');
    // });

    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
    });

    Route::controller(FeedbackController::class)->prefix('feedbacks')->name('feedbacks.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
    });





    Route::get('/client/home', [ClientHomeController::class, 'index'])->name('client.home');
    Route::post('/client/home/showtimes', [ClientHomeController::class, 'getShowtimes'])->name('client.showtime');
    Route::post('/home/booking', [ClientHomeController::class, 'bookShowtime'])->name('client.book');
    Route::get('/client/home/movie/{id}', [ClientHomeController::class, 'show'])->name('movieinfo.show');
    Route::post('/client/home', [ClientHomeController::class, 'getMovies'])->name('client.getMovies');



    Route::view('/client/user', 'client.user')->name('client.user');

    Route::resource('reservations',ReservationController::class);
    Route::resource('users',UserController::class);


    //showtime route
Route::get('/client/showtimes',[ShowTimeController::class,'display_showtime'])->name('showtimes.display_showtime');

//booking


//payment
Route::POST('/payment', [PaymentController::class, 'proceedToPayment'])->name('payments.proceedToPayment');
Route::get('/client/payment', [PaymentController::class, 'showPaymentPage'])->name('payments.showPaymentPage');
Route::post('/payments', [PaymentController::class, 'finalizeBooking'])->name('payments.finalizeBooking');


//reservation
Route::get('/booking',[ReservationController::class,'showBooking'])->name('booking.showBooking');
});


//movie controller
Route::get('/client/movies',[MovieController::class,'clientIndex'])->name('movies.clientIndex');
Route::get('client/movies/{id}', [MovieController::class, 'show'])->name('client.movie');

//cinema route
Route::get('/client/cinemas',[CinemaController::class,'cinemaindex'])->name('cinemas.cinemaindex');






require __DIR__ . '/auth.php';
