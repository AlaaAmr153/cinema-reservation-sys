<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Payment;
use App\Models\Seat;
use App\Models\ShowTime;
use Illuminate\Http\Request;

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
        $bookingInfo = $request->session()->get('booking_info');
        // $cinema = Cinema::find($bookingInfo['cinema_id']);
        // $movie = Movie::find($bookingInfo['movie_id']);
        // $showtime = ShowTime::find($bookingInfo['showtime_id']);
        // $seats = Seat::findMany($bookingInfo['seats']); // Fetch multiple seats
        if (is_null($bookingInfo)) {
            return redirect()->route('client.home')->with('error', 'No booking information found.');
        }

        // Ensure keys exist before accessing

        $cinema = Cinema::findOrFail($bookingInfo['cinema_id']);
        $movie = Movie::findOrFail($bookingInfo['movie_id']);
        $showtime = ShowTime::findOrFail($bookingInfo['showtime_id']);
        // $seats = Seat::findMany($bookingInfo['seats']); //



        return view('client.payment', compact('cinema', 'movie', 'showtime'));
    }



public function proceedToPayment(Request $request)
{
    // dd($request->all());
    $validated = $request->validate([
        'cinemas' => 'required',
        'movie' => 'required|exists:movies,id',
        'showtime' => 'required|exists:show_times,id',
        'seats' => 'required|array',
    ]);

    $request->session()->put('booking_info', [
        'cinema_id' => $validated['cinemas'],
        'movie_id' => $validated['movie'],
        'showtime_id' => $validated['showtime'],
        'seats' => $validated['seats'], // Store selected seats
    ]);

    return redirect()->route('payments.showPaymentPage');

}

}
