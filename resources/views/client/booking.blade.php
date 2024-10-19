@extends('layouts.layout')

@section('title')
    Booking
@endsection

@push('style')
    <link rel='stylesheet' href='{{ asset('css/client/style/pages/booking.css') }}'>
@endpush

@section('content')
<section class="top">
    <form id="details" method="post" action="{{ route('payments.proceedToPayment') }}">
        @csrf

        <div class="form-inline">
            <label for="cinema" class="select" data-icon-before="location"><span>{{ $cinema->cinema_name }}</span></label>
            <input type="hidden" id="cinema" name="cinema" value="{{ $cinema->id }}">
        </div>

        <div class="form-inline">
            <label for="day" class="select" data-icon-before="date"><span>{{ $showtime->show_date }}</span></label>
            <input type="hidden" id="day" name="day" value="{{ $showtime->show_date }}">
        </div>

        <div class="form-inline">
            <label for="time" class="select" data-icon-before="time"><span>{{ $showtime->show_time }}</span></label>
            <input type="hidden" id="time" name="time" value="{{ $showtime->show_time }}">
        </div>

        <input type="hidden" name="showtime_id" value="{{ $showtime->id }}">
        <input type="hidden" name="movie" value="{{ $movie->id }}">

        <input type="hidden" name="seats" id="selectedSeats">

        <div class="form-inline">
            <button class="raised-button primary" type="submit">Next</button>
        </div>

    </form>
</section>

<section class="bottom">
    <p class="warning"><span>Please choose a time slot first!</span> <i onclick="this.parentElement.style.display='none'">&times;</i></p>
    <h2 class="title">{{ $movie->title }}</h2>
    <p class="info"><span>{{ $cinema->cinema_name }} - Hall : {{ $showtime->screen->screen_code }}</span><i data-icon="imax"></i> <i data-icon="dolby"></i></p>

    <div id="seat-layout" class="seat-layout">
        @foreach($seats as $seat)
            <div class="seat {{ $seat['is_booked'] ? 'occupied' : 'available' }}" data-seat-code="{{ $seat['seat_code'] }}">
                {{ $seat['seat_code'] }}
            </div>
        @endforeach
    </div>

    <ul class="legends row">
        <li><span></span>Available</li>
        <li><span class="occupied"></span>Occupied</li>
        <li><span class="selected"></span>Selected</li>
    </ul>
</section>
@endsection

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const seatElements = document.querySelectorAll('.seat.available');
        const selectedSeatsInput = document.getElementById('selectedSeats');
        const bookingButton = document.querySelector('button[type="submit"]');

        let selectedSeats = [];

        // Handle seat selection
        seatElements.forEach(seat => {
            seat.addEventListener('click', function() {
                const seatCode = this.getAttribute('data-seat-code');

                // Toggle selection
                if (selectedSeats.includes(seatCode)) {
                    selectedSeats = selectedSeats.filter(s => s !== seatCode);
                    this.classList.remove('selected');
                } else {
                    selectedSeats.push(seatCode);
                    this.classList.add('selected');
                }

                // Update hidden input with selected seat numbers
                selectedSeatsInput.value = JSON.stringify(selectedSeats);

                // Enable or disable booking button based on seat selection
                bookingButton.disabled = selectedSeats.length === 0;
            });
        });

        // Ensure seats are selected before submitting the form
        document.getElementById('details').addEventListener('submit', function(event) {
            if (selectedSeats.length === 0) {
                event.preventDefault();
                alert('Please select at least one seat.');
            }
        });
    });
</script>
@endpush
