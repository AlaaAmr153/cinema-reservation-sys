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








    // public function bookShowtime(Request $request)
    // {
    //     $validated = $request->validate([
    //         'cinemas' => 'required',
    //         'movie' => 'required|exists:movies,id',
    //         'showtime' => 'required|exists:show_times,id',
    //         'seats' => 'required|array',
    //     ]);

    //     $movie_id = $request->input('movie');
    //     $showtime_id = $request->input('showtime');
    //     $selectedSeats = $request->input('seats');

    //     // Initialize total price
    //     $totalPrice = 0;

    //     // Fetch the seat information and mark them as booked
    //     foreach ($selectedSeats as $seat_id) {
    //                 $seat = Seat::findOrFail($seat_id);
    //         if (!$seat->is_booked) {
    //             $seat->is_booked = true; // Mark as booked
    //             $seat->save(); // Save the updated seat
    //             $totalPrice += $seat->seat_cost; // Calculate total price
    //         }
    //     }

    //     // Save reservation information
    //     $reservation = new Reservation();
    //     $reservation->no_of_tickets = count($selectedSeats);
    //     $reservation->total_price = $totalPrice;
    //     $reservation->booking_time = now();
    //     $reservation->user_id = auth()->id; // Assuming user is authenticated
    //     $reservation->movie_id = $movie_id;
    //     $reservation->show_time_id = $showtime_id;
    //     // Include screen ID if needed
    //     $reservation->screen_id = $request->input('screen_id'); // Make sure to pass this in your form
    //     $reservation->save();

    //     return redirect()->route('client.payment')->with('success', 'Booking Successful!');
    // }


    public function finalizeBooking(Request $request)
    {
        // Validate payment (you'll likely do this with your payment gateway)
        $request->validate([
            'payment_method' => 'required', // Example validation
        ]);

        $bookingInfo = $request->session()->get('booking_info');
        $totalPrice = 0;

        // Mark seats as booked
        foreach ($bookingInfo['seats'] as $seat_id) {
            $seat = Seat::findOrFail($seat_id);
            if (!$seat->is_booked) {
                $seat->is_booked = true; // Mark as booked
                $totalPrice += $seat->seat_cost; // Calculate total price
                $seat->save(); // Save updated seat
            }
        }

        // Save reservation information
        $reservation = new Reservation();
        $reservation->no_of_tickets = count($bookingInfo['seats']);
        $reservation->total_price = $totalPrice;
        $reservation->booking_time = now();
        $reservation->user_id = auth()->id; // Assuming user is authenticated
        $reservation->movie_id = $bookingInfo['movie_id'];
        $reservation->show_time_id = $bookingInfo['showtime_id'];
        // Include screen ID if needed
        $reservation->screen_id = $request->input('screen_id'); // Pass this from payment form if applicable
        $reservation->save();

        // Clear session data after saving
        $request->session()->forget('booking_info');

        return redirect()->route('client.movies')->with('success', 'Booking Successful!');
    }
}







