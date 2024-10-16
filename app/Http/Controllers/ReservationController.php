<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Seat;
use App\Models\ShowTime;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {

    //    // If the user has passed data from the Home page, extract it
    //    $selectedCinema = $request->cinema;
    //    $selectedMovie = $request->movie;
    //    $selectedShowtime = $request->showtime;

    //    // Get all cinemas
    //    $cinemas = Cinema::all();
    //    $movies = Movie::all();  // Will be updated dynamically via AJAX
    //    $showtimes = Showtime::all();  // Will be updated dynamically via AJAX

    //    // If there's a pre-selected cinema or movie, fetch related data


    //    // Pass the selected values to the view
    //    return view('client.booking', compact('cinemas', 'movies', 'showtimes', 'selectedCinema', 'selectedMovie', 'selectedShowtime'));

    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

    public function fetchShowtimes(Request $request)
    {
        $movie_id = $request->movie_id;
        $showtimes = ShowTime::where('movie_id', $movie_id)->get(['id', 'show_time', 'show_date']);
        return response()->json(['showtime' => $showtimes]);

    }






    public function bookShowtime(Request $request)
    {
        $validated = $request->validate([
            'cinemas' => 'required',
            'movie' => 'required|exists:movies,id',
            'showtime' => 'required|exists:show_times,id'
        ]);

        $cinema_id = $request->input('cinemas');
        $movie_id = $request->input('movie');
        $showtime_id = $request->input('showtime');

        $cinema = Cinema::findOrFail($cinema_id);
        $movie = Movie::findOrFail($movie_id);
        $showtime = Showtime::findOrFail($showtime_id);

        return view('client.booking', compact('cinema', 'movie', 'showtime'));
    }

    // Save the reservation




    public function book(Request $request)
{
    $request->validate([
        'cinema' => 'required|integer',
        'movie' => 'required|integer',
        'showtime' => 'required|integer',
        'seats' => 'required|string',
    ]);

    // Save booking details in the database
    $booking = new Reservation();
    $booking->cinema_id = $request->cinema;
    $booking->movie_id = $request->movie;
    $booking->showtime_id = $request->showtime;
    $booking->seats = $request->seats; // Store selected seats as a string
    $booking->user_id = auth()->id(); // Assuming user is authenticated
    $booking->save();

    // Optionally, you might want to mark seats as occupied
    $selectedSeats = explode(',', $request->seats);
    foreach ($selectedSeats as $seat) {
        $seatModel = Seat::where('seat_number', $seat)
                         ->where('showtime_id', $request->showtime)
                         ->first();
        if ($seatModel) {
            $seatModel->occupied = true;
            $seatModel->save();
        }
    }

    return redirect()->route('booking.success'); // Redirect to a success page
}


}


