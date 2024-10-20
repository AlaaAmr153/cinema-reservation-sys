<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Screen;
use App\Models\Seat;
use App\Models\ShowTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
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
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
    public function showPaymentPage(Request $request)
    {
        // $seatId = ReservationController::getSeatIdFromCode($seatCode, $screen->id);
        // $isBooked = ReservationController::checkIfBooked($seatId, $showtime->id);

        $bookingInfo = $request->session()->get('booking_info');
        if (is_null($bookingInfo)) {
            return redirect()->route('client.home');
        }


        $cinema = Cinema::findOrFail($bookingInfo['cinema_id']);
        $movie = Movie::findOrFail($bookingInfo['movie_id']);
        $showtime = ShowTime::findOrFail($bookingInfo['showtime_id']);
        $seats =json_decode($bookingInfo['seats'], true);
        $seatCost= Seat::first()->seat_cost;
        $totalCost = count($seats) * $seatCost;


        //we can use this if we have different cost for each seat
//         $totalCost = 0;
//         foreach ($seats as $seatCode) {
//         $seat = Seat::where('seat_code', $seatCode)->first();
//         if ($seat) {
//         $totalCost += $seat->seat_cost;
//         }

        return view('client.payment', compact('cinema', 'movie', 'showtime','seats','seatCost','totalCost'));
    }



    public function proceedToPayment(Request $request)
    {
        $validated = $request->validate([
            'cinema' => 'required|exists:cinemas,id',
            'movie' => 'required|exists:movies,id',
            'showtime_id' => 'required|exists:show_times,id',
            'seats' => 'required|json',
        ]);


        $request->session()->put('booking_info', [
            'cinema_id' => $validated['cinema'],
            'movie_id' => $validated['movie'],
            'showtime_id' => $validated['showtime_id'],
            'seats' => $validated['seats'],
        ]);

        return redirect()->route('payments.showPaymentPage');
    }




    public function finalizeBooking(Request $request)
    {
        $request->validate([
            'method' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);


        try{
    $bookingInfo = $request->session()->get('booking_info');
    if (is_null($bookingInfo)) {
        return redirect()->route('client.home')->with('error', 'No booking information found.');
    }

    DB::transaction(function () use ($bookingInfo, $request) {
        // Insert into seats table
        $seats = json_decode($bookingInfo['seats'], true);
        foreach ($seats as $seatCode) {
            Seat::where('seat_code', $seatCode)->update(['is_booked' => true]);
        }

        // foreach ($request['seats'] as $seatId) {
        //     $seat = Seat::find($seatId);
        //     $seat->is_booked = true; // Mark seat as booked
        //     $seat->save();
        // }



        // insert into reservation table
        $reservation = Reservation::create([
            'no_of_tickets' => count($seats),
            'total_price' => count($seats) * Seat::first()->seat_cost,
            'booking_time' => now(),
            'user_id' => auth()->id(),
            'movie_id' => $bookingInfo['movie_id'],
            'show_time_id' => $bookingInfo['showtime_id'],
            'screen_id' => $request->input('screen_id'),
        ]);

        // insert into payment
        Payment::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'method' => $request->input('method'),
            // 'status' => 'completed',
            'payment_time' => now(),
            'user_id' => auth()->id(),
            'reservation_id' => $reservation->id,
        ]);
    });

        return response()->json(['success' => true]);
}catch(\Exception $e){

             DB::rollBack();
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
}

    // Clear session data
    // $request->session()->forget('booking_info');

    // return redirect()->route('client.movies')->with('success', 'Booking Successful!');
}

}
