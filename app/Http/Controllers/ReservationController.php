<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Screen;
use App\Models\ScreenHasSeat;
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

        if (is_null($bookingInfo)) {
            return redirect()->route('client.home')->with('error', 'No booking information found.');
        }

        $cinema = Cinema::findOrFail($bookingInfo['cinema_id']);
        $movie = Movie::findOrFail($bookingInfo['movie_id']);
        $showtime = ShowTime::findOrFail($bookingInfo['showtime_id']);
        $screen = Screen::where('cinema_id', $cinema->id)->firstOrFail();
        $seatCapacity = $screen->seat_capacity;

        $columns = 10;
        $rows = ceil($seatCapacity / $columns);

        $seats = [];
        for ($r = 0; $r < $rows; $r++) {
            for ($c = 0; $c < $columns; $c++) {
                $seatCode = chr(65 + $r) . ($c + 1);
                $seatId = $this->getSeatIdFromCode($seatCode, $screen->id);

                if (($r * $columns + $c) < $seatCapacity) {
                    $seats[] = [
                        'seat_code' => $seatCode,
                        'is_booked' => $this->checkIfBooked($seatId, $showtime->id)
                    ];
                }
            }
        }

        return view('client.booking', compact('cinema', 'movie', 'showtime', 'seats', 'screen'));
    }


    private function getSeatIdFromCode($seatCode, $screenId)
{

    $screenHasSeat = ScreenHasSeat::whereHas('seat', function ($query) use ($seatCode) {
        $query->where('seat_code', $seatCode);
    })->where('screen_id', $screenId)->first();

    return $screenHasSeat ? $screenHasSeat->seat_id : null;
}

private function checkIfBooked($seatId, $showtime)
{
    return Reservation::where('seat_id', $seatId)
        ->where('show_time_id', $showtime)
        ->exists();
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






