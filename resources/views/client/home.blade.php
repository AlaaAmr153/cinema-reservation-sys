@extends('layouts.layout')
@section('title')
    Movie Booking System
@endsection
@push('style')
    <link rel='stylesheet' href='{{ asset('css/client/style/pages/home.css') }}'>
@endpush
@section('content')

    <section class="top">


    <div class='slideshow' data-delay='3000' data-speed='800'>
            <figure>
            @foreach($moviesInfo as $movie)

                <a href="{{ route('movieinfo.show', ['id' => $movie->id]) }}">
                    <img src="{{ asset($movie->poster) }}" alt="{{ $movie->title }}" style="width:100%;">
                </a>

            @endforeach
                <!-- <a href="{{ route('movieinfo.show', [1]) }}">
                    <img src='public/images/site_images/slideshow/crazy_rich_asian.jpg' alt='Crazy Rich Asian'>
                </a>
                <a href="{{ route('movieinfo.show', [2]) }}">
                    <img data-src='images/site_images/slideshow/europe_raiders.jpg' alt='Europe Raiders'>
                </a>
                <a href="{{ route('movieinfo.show', [3]) }}">
                    <img data-src='images/site_images/slideshow/fantastic_beasts.jpg' alt='Fantastic Beast'>
                </a>
                <a href="{{ route('movieinfo.show', [4]) }}">
                    <img data-src='images/site_images/slideshow/sui_dhaaga.jpg' alt='Sui Dhaaga'>
                </a> -->
            </figure>
    </div>


        <form id="quickBuy" method="POST" action="{{route('client.book')}} ">
        @csrf

        <div class="select-hover">
            <!-- <label for="cinemas" class="select" data-icon-before="location"><span>Choose Cinema</span></label> -->
            <select name="cinemas" id="cinema" class="select">
                <option value="">Choose Cinema</option>
                @foreach($cinemas as $cinema)
                    <option value="{{ $cinema->id }}" {{ old('cinemas') == $cinema->id ? 'selected' : '' }}>{{ $cinema->cinema_name }}</option>
                @endforeach
            </select>
            @if ($errors->has('cinemas'))
            <div class="error">{{ $errors->first('cinemas') }}</div>
            @endif
        </div>

        <div class="select-hover">
            <!-- <label for="movie" class="select" data-icon-before="movie"><span>Choose Movie</span></label> -->
            <select name="movie" id="movie" class="select" >
                <option selected>Choose Movie</option>
                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}"{{ old('movie') == $movie->id ? 'selected' : '' }}>{{ $movie->title }}</option>
                @endforeach
            </select>
            @if ($errors->has('movie'))
                <div class="error">{{ $errors->first('movie') }}</div>
            @endif
        </div>

        <div class="select-hover">
            <!-- <label for="showtime" class="select" data-icon-before="time"><span>Choose Time</span></label> -->
                <select name="showtime" id="showtime" class="select">
                    <option value="">Choose Time</option>

                </select>
                @if ($errors->has('showtime'))
                    <div class="error">{{ $errors->first('showtime') }}</div>
                @endif
        </div>
        <div class="buttons">
            <button type="reset" class="raised-button"><span>reset</span></button>
            <button type="submit" class="raised-button primary"><span>go</span></button>
        </div>
    </form>
        <!-- <form id="quickBuy">
            <label for="cinema" class="select" data-icon-before="location"><span>Choose Cinema</span></label>
            <input type="text" id="cinema" name="cinema" hidden>
            <label for="movie" class="select" data-icon-before="movie"><span>Choose Movie</span></label>
            <input type="text" id="movie" name="movie" hidden>
            <label for="time" class="select" data-icon-before="time"><span>Choose Time</span></label>
            <input type="text" id="time" name="time" hidden>
            <input type="text" id="showtime" name="showtime" hidden>
            <div class="buttons">
                <button type="reset" class="raised-button"><span>reset</span></button>
                <button type="submit" class="raised-button primary"><span>go</span></button>
            </div>
        </form> -->
    </section>
    <section class="bottom">
        <h2>upcoming</h2>
        <div class="slider">
            <div class="container" id="movieContainer">
            @foreach($moviesInfo2 as $movie)
                <div class="movie" data-id="1">

                    <img src="{{ asset($movie->poster) }}" alt="{{ $movie->title }}">

                <a href="{{ route('movieinfo.show', ['id' => $movie->id]) }}">
                    <div class="info">
                        <span>{{ $movie->title }}</span>
                        <span>Drama</span>
                        <span>{{ $movie->duration}}</span>
                    </div>
                </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="controls">
            <button class="control_left" id="leftControl">&#10094;</button>
            <button class="control_right" id="rightControl">&#10095;</button>
        </div>
    </section>
@endsection

@push('script')
    <script  src='{{ asset('js/client/javascript/slideshow.js') }}'></script>
    <script  src='{{ asset('js/client/javascript/slider.css') }}'></script>
    <script  src='{{ asset('js/client/javascript/pages/home.js') }}'></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            $('#movie').on('change', function () {

            var movie_id = this.value;

            $("#showtime").html('');

            $.ajax({

                url: "{{route('client.showtime')}}",

                type: "POST",

                data: {

                    movie_id: movie_id,

                    _token: '{{csrf_token()}}'

                },

                dataType: 'json',

                success: function (result) {

                    $('#showtime').html('<option value="">Choose Time</option>');

                    $.each(result.showtime, function (key, value) {

                        var showDate = new Date(value.show_date);
                        var options = { weekday: 'short', day: 'numeric', month: 'short' };
                        var formattedDate = showDate.toLocaleDateString('en-GB', options);


                        var time = value.show_time.split(':');
                        var hours = parseInt(time[0]);
                        var minutes = time[1];
                        var ampm = hours >= 12 ? 'PM' : 'AM';
                        hours = hours % 12;
                        hours = hours ? hours : 12;
                        var formattedTime = hours + ':' + minutes + ' ' + ampm;


                        var showDateTime = formattedDate + ' ' + formattedTime;


                        $("#showtime").append('<option value="' + value.id + '">' + showDateTime + '</option>');
                    });


                }

            });
            });
            });

    </script>
@endpush
