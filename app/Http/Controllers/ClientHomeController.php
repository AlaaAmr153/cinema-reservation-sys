<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Seat;
use App\Models\ShowTime;

class ClientHomeController extends Controller
{

    public function index()
    {
        $cinemas = Cinema::all();
        $movies = Movie::all();
        $showtimes = Showtime::all();
        $moviesInfo = Movie::orderBy('release_date', 'asc')->take(4)->get();
        $moviesInfo2 = Movie::orderBy('release_date', 'desc')->take(10)->get();

        return view('client.home', compact('cinemas', 'movies', 'showtimes', 'moviesInfo', 'moviesInfo2'));
    }




// to fetch showtimes by movie
    public function getShowtimes(Request $request)
    {
        $movie_id = $request->movie_id;
        $showtimes = Showtime::where('movie_id', $movie_id)->get(['id', 'show_time', 'show_date']);
        return response()->json(['showtime' => $showtimes]);
    }




    public function bookShowtime(Request $request)
    {
        $validated = $request->validate([
            'cinemas' => 'required',
            'movie' => 'required|exists:movies,id',
            'showtime' => 'required|exists:show_times,id'
        ], [
            'cinemas.required' => 'Please select a cinema.',
            'movie.required'   => 'Please select a movie.',
            'showtime.required'=> 'Please select a showtime.',
        ]);

        $request->session()->put('booking_info', [
            'cinema_id' => $validated['cinemas'],
            'movie_id' => $validated['movie'],
            'showtime_id' => $validated['showtime']
        ]);


        return redirect()->route('booking.showBooking');
}

    public function show($id)
    {
        $movieInfo = Movie::findOrFail($id);
        return view('client.movie', compact('movieInfo'));
    }



}
