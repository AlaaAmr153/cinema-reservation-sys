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
        <label for="cinema" class="select" data-icon-before="location"><span>{{$cinema->cinema_name}}</span></label>
        <input type="text" id="cinema" name="cinema" hidden>
        <label for="day" class="select" data-icon-before="date"><span>{{ $showtime->show_date }}</span></label>
        <input type="text" id="day" name="day" hidden>
        <label for="time" class="select" data-icon-before="time"><span>{{ $showtime->show_time }}</span></label>
        <input type="text" id="time" name="time" hidden>



{{-- <form  class="flex" id="bookingForm" method="POST" action="{{ route('client.book') }}">
            @csrf

            <input type="hidden" id="cinema" name="cinema" value="{{ $selectedCinema }}">
            <input type="hidden" name="movie" id="movie" value="{{ $selectedMovie }}">
            <input type="hidden" name="showtime" id="showtime" value="{{ $selectedShowtime }}">

            <!-- Cinema Select Box -->
            <div class="select-hover">
                <select name="cinemas" id="cinema" class="select">
                    <option value="">Choose Cinema</option>
                    @foreach($cinemas as $cinema)
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
                    @foreach($movies as $movie)
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
                    @foreach($showtimes as $showtime)
                        <option value="{{ $showtime->id }}" {{ $showtime->id == $selectedShowtime ? 'selected' : '' }}>
                            {{ $showtime->show_time }} on {{ $showtime->show_date }}
                        </option>
                    @endforeach
                </select>
            </div> --}}


        <id="details">
            <input type="text" id="seats" name="seats" hidden>
            <input type="text" id="showtime" name="showtime" hidden value="">

            <button class="raised-button primary" >next</button>

            <input type="text" name="type" value="ADD_SHOWTIME" hidden>
        </form>

    </section>



    <section class="bottom">
        <p class="warning"><span>Please choose a time slot first!</span> <i
                onclick="this.parentElement.style.display='none'">&times;</i></p>

        <h2 class="title">{{$movie->title}}</h2>
        <p class="info"><span>{{$cinema->cinema_name}} - Hall : {{$showtime->screen->screen_code}}</span><i data-icon="imax"></i> <i data-icon="dolby"></i></p>
        {{-- @foreach ($seats as $seat )
        <p>Cost Of The Ticket : {{$seat->seat_cost}} </p>
        @endforeach --}}

            <div class="layout" id="seat-layout">
                {{-- @foreach ($seats as $seat)
                    <span class="seat {{ $seat->is_booked ? 'active' : '' }}" data-seat-id="{{ $seat->id }}">{{ $seat->seat_code }}</span>
                @endforeach --}}
            </div>

        <ul class="legends row">
            <li><span></span>Available</li>
            <li><span class="active"></span>Occupied</li>
            <li><span class="chosen"></span>Selected</li>
        </ul>
    </section>
@endsection

@push('script')
    <script src='{{ asset('js/client/javascript/pages/booking.js') }}'></script>
    {{-- // Fetch Movies based on the selected cinema
        $('#cinema').on('change', function () {
            var cinema_id = this.value;
            $("#movie").html('<option value="">Choose Movie</option>'); // Reset movie select box

            if (cinema_id) {
                $.ajax({
                    url: "{{ route('client.fetchMoviesByCinema') }}",
                    type: "POST",
                    data: {
                        cinema_id: cinema_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $.each(result.movies, function (key, value) {
                            $("#movie").append('<option value="' + value.id + '">' + value.title + '</option>');
                        });
                    }
                });
            }
        });

        // Fetch Showtimes based on the selected movie
        $('#movie').on('change', function () {
            var movie_id = this.value;
            $("#showtime").html('<option value="">Choose Time</option>');

            if (movie_id) {
                $.ajax({
                    url: "{{ route('client.fetchShowtimesByMovie') }}",
                    type: "POST",
                    data: {
                        movie_id: movie_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $.each(result.showtimes, function (key, value) {
                            var showDate = new Date(value.show_date);
                            var formattedDate = showDate.toLocaleDateString('en-GB', { weekday: 'short', day: 'numeric', month: 'short' });
                            var time = value.show_time.split(':');
                            var hours = parseInt(time[0]);
                            var formattedTime = (hours > 12 ? hours - 12 : hours) + ':' + time[1] + (hours >= 12 ? ' PM' : ' AM');
                            $("#showtime").append('<option value="' + value.id + '">' + formattedDate + ' ' + formattedTime + '</option>');
                        });
                    }
                });
            }
        });

        // Update hidden fields for form submission
        $('#cinema, #movie, #showtime').on('change', function () {
            $('#selected_cinema').val($('#cinema').val());
            $('#selected_movie').val($('#movie').val());
            $('#selected_showtime').val($('#showtime').val());
        }); --}}
@endpush
