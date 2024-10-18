@extends('layouts.layout')

@section('title')
    Booking
@endsection

@push('style')
    <link rel='stylesheet' href='{{ asset('css/client/style/pages/booking.css') }}'>
@endpush

@section('content')
    {{-- <aside class="left-panel">
        <h2>Snack</h2>
        <div class="item">
            <img src="images/combo_a.jpg" alt="Combo A">
            <div class="content">
                <label for="combo_a">Combo A <br>$9.00</label>
                <div class="input">
                    <input type="number" name="combo_a" id="combo_a" value="0" readonly form="details">
                    <button class="plus control-button">+</button>
                    <button class="minus control-button">-</button>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="images/combo_b.jpg" alt="Combo B">
            <div class="content">
                <label for="combo_b">Combo B <br>$8.50</label>
                <div class="input">
                    <input type="number" name="combo_b" id="combo_b" value="0" readonly form="details">
                    <button class="plus control-button">+</button>
                    <button class="minus control-button">-</button>
                </div>
            </div>
        </div>
        <button class="control" data-count="0"></button>
    </aside> --}}

    <section class="top">
        <form method="POST" action="{{ route('payments.proceedToPayment') }}">
            @csrf

            <input type="hidden" id="cinema" name="cinema" value="{{ $cinema->id }}">
            <input type="hidden" id="movie" name="movie" value="{{ $movie->id }}">
            <input type="hidden" id="showtime" name="showtime" value="{{ $showtime->id }}">

            <label for="cinema" class="select" data-icon-before="location">
                <span>{{ $cinema->cinema_name }}</span>
            </label>

            <label for="day" class="select" data-icon-before="date">
                <span>{{ $movie->title }}</span>
            </label>
            <label class="select" data-icon-before="time">
                <span> date:{{ $showtime->show_date }}
                    time:{{ $showtime->show_time }}</span>
            </label>

            <a href="{{route('payments.showPaymentPage')}}" class="raised-button primary">next</a>

            {{-- <form  class="flex" id="bookingForm" method="POST" action="{{ route('client.book') }}">
            @csrf

            <input type="hidden" id="cinema" name="cinema" value="{{ $selectedCinema }}">
            <input type="hidden" name="movie" id="movie" value="{{ $selectedMovie }}">
            <input type="hidden" name="showtime" id="showtime" value="{{ $selectedShowtime }}">

            <!-- Cinema Select Box -->
            <div class="select-hover">
                <select name="cinemas" id="cinema" class="select">
                    <option value="">Choose Cinema</option>
                    @foreach ($cinemas as $cinema)
                        <option value="{{ $cinema->id }}" {{ $cinema->id == $selectedCinema ? 'selected' : '' }}>
                            {{ $cinema->cinema_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Movie Select Box (will be dynamically updated) -->
            <div class="select-hover">
                <select name="movie" id="movie" class="select">
                    <option value="">Choose Movie</option>
                    @foreach ($movies as $movie)
                        <option value="{{ $movie->id }}" {{ $movie->id == $selectedMovie ? 'selected' : '' }}>
                            {{ $movie->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Showtime Select Box (will be dynamically updated) -->
            <div class="select-hover">
                <select name="showtime" id="showtime" class="select">
                    <option value="">Choose Time</option>
                    @foreach ($showtimes as $showtime)
                        <option value="{{ $showtime->id }}" {{ $showtime->id == $selectedShowtime ? 'selected' : '' }}>
                            {{ $showtime->show_time }} on {{ $showtime->show_date }}
                        </option>
                    @endforeach
                </select>
            </div> --}}


            {{-- <id="details">
            <input type="text" id="showtime" name="showtime" hidden> --}}

            {{-- <input type="text" name="type" value="ADD_SHOWTIME" hidden> --}}


    </section>



    <section class="bottom">
        <p class="warning"><span>Please choose a time slot first!</span> <i
                onclick="this.parentElement.style.display='none'">&times;</i></p>

        <h2 class="title">{{ $movie->title }}</h2>
        <p class="info"><span>{{ $cinema->cinema_name }} - Hall : {{ $showtime->screen->screen_code }}</span><i
                data-icon="imax"></i> <i data-icon="dolby"></i></p>

        <div class="layout" id="seat-layout">
            <div style="padding-left:40px; display: flex; flex-wrap: wrap;">
                @foreach ($seats as $seat)
                    <div style="flex: 0 0 10%; padding: 10px; display: flex; align-items: center;">
                        <input type="checkbox" id="seat_{{ $seat->id }}" name="seats[]" value="{{ $seat->id }}"
                            {{ $seat->is_booked ? 'disabled' : '' }}
                            style="transform: scale(1.5); margin-right: 8px; cursor: pointer; background-color:#f1b451 ;" />
                        <label for="seat_{{ $seat->id }}" style="color: #f1b451">{{ $seat->seat_code }}</label>
                    </div>
                    <input type="hidden" id="seats" name="seats[]" value="{{ $seat->id }}">

                @endforeach
            </div>
        </div>
        </form>
        <ul class="legends row">
            <li><span></span>Available</li>
            <li><span class="active"></span>Occupied</li>
            <li><span class="chosen"></span>Selected</li>
        </ul>
    </section>
@endsection

@push('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.seat-checkbox').forEach(function(checkbox) {
            if (checkbox.disabled) {
                checkbox.parentElement.style.opacity = 0.5; // Visual cue for disabled seats
            }
        });
    });
</script>
    {{-- <script src='{{ asset('js/client/javascript/pages/booking.js') }}'></script> --}}
@endpush
