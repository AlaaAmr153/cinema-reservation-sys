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




    Route::controller(PaymentController::class)->prefix('payments')->name('payments.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
    });

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


Route::view('/client/home', 'client.home')->name('client.home');
// Route::view('/client/movies', 'client.movies')->name('client.movies');
// Route::view('/client/cinemas', 'client.cinemas')->name('client.cinemas');
// Route::view('/client/contact', 'client.contact')->name('client.contact');
Route::view('/client/payment', 'client.payment');
Route::view('/client/movie', 'client.movie');
Route::view('/client/showtime', 'client.showtime');
Route::view('/client/user', 'client.user');


    // Route::resource('movies',MovieController::class);
    // Route::resource('showtimes',ShowTimeController::class);
    // Route::resource('seats',SeatController::class);
    // Route::resource('cinemas',CinemaController::class);
    // Route::resource('screens',ScreenController::class);

    Route::resource('users',UserController::class);


});

//movie controller
Route::get('/client/movies',[MovieController::class,'clientIndex'])->name('movies.clientIndex');
Route::get('/client/cinemas',[CinemaController::class,'cinemaindex'])->name('cinemas.cinemaindex');
Route::get('/search',[SearchController::class,'index'])->name('search.index');
Route::get('/client/showtimes',[ShowTimeController::class,'display_showtime'])->name('showtimes.display_showtime');


require __DIR__ . '/auth.php';
