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
    public function index(Request $request)
    {

    }

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


    public function showBooking(Request $request)
    {
        $bookingInfo = $request->session()->get('booking_info');

        // Ensure keys exist
        if (is_null($bookingInfo)) {
            return redirect()->route('client.home')->with('error', 'No booking information found.');
        }

        $cinema = Cinema::findOrFail($bookingInfo['cinema_id']);
        $movie = Movie::findOrFail($bookingInfo['movie_id']);
        $showtime = ShowTime::findOrFail($bookingInfo['showtime_id']);
        $seats = Seat::all(); // You might want to fetch available seats based on the showtime

        return view('client.booking', compact('cinema', 'movie', 'showtime', 'seats'));
    }




    public function finalizeBooking(Request $request)
    {
        $request->validate([
            'payment_method' => 'required',
        ]);

        $bookingInfo = $request->session()->get('booking_info');
        $totalPrice = 0;

        // Mark seats as booked
        Seat::whereIn('id', $bookingInfo['seats'])->update(['is_booked' => true]);

        // Save reservation information
        $reservation = new Reservation();
        $reservation->no_of_tickets = count($bookingInfo['seats']);
        $reservation->total_price = $totalPrice;
        $reservation->booking_time = now();
        $reservation->user_id = auth()->id;
        $reservation->movie_id = $bookingInfo['movie_id'];
        $reservation->show_time_id = $bookingInfo['showtime_id'];
        $reservation->screen_id = $request->input('screen_id');
        $reservation->save();

        $request->session()->forget('booking_info');

        return redirect()->route('client.movies')->with('success', 'Booking Successful!');
    }
}







