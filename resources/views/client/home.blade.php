@extends('layouts.layout')
@section('title')
    Movie Booking System
@endsection
@push('style')
    <link rel='stylesheet' href='{{ asset('css/client/style/pages/home.css') }}'>
@endpush
@section('content')

    <section class="top">
        <div class='slideshow' data-delay='3000' data-speed='500'>
            <figure>
                <img data-src='images/slideshow/crazy_rich_asian.jpg' alt='Crazy Rich Asian'>
                <img data-src='images/slideshow/europe_raiders.jpg' alt='Europe Raiders'>
                <img data-src='images/slideshow/fantastic_beasts.jpg' alt='Fantastic Beast'>
                <img data-src='images/slideshow/sui_dhaaga.jpg' alt='Sui Dhaaga'>
            </figure>
        </div>
        <form id="quickBuy">
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
        </form>
    </section>
    <section class="bottom">
        <h2>upcoming</h2>
        <div class="slider">
            <div class="container">
                <div class="movie" data-id="1">
                    <img src="images/posters/1.jpg" alt="First Man">
                    <div class="info">
                        <span>First Man</span>
                        <span>Drama</span>
                        <span>150 min</span>
                    </div>
                </div>
                <div class="movie" data-id="9">
                    <img src="images/posters/9.jpg" alt="Fantastic Beasts: The Crimes Of Grindelwald">
                    <div class="info">
                        <span>Fantastic Beasts: The Crimes Of Grindelwald</span>
                        <span>Adventure</span>
                        <span>116 min</span>
                    </div>
                </div>
                <div class="movie" data-id="10">
                    <img src="images/posters/10.jpg" alt="Rampant">
                    <div class="info">
                        <span>Rampant</span>
                        <span>Action</span>
                        <span>129 min</span>
                    </div>
                </div>
                <div class="movie" data-id="14">
                    <img src="images/posters/14.jpg" alt="The Predator">
                    <div class="info">
                        <span>The Predator</span>
                        <span>Action</span>
                        <span>107 min</span>
                    </div>
                </div>
                <div class="movie" data-id="15">
                    <img src="images/posters/15.jpg" alt="16 levers de soleil ">
                    <div class="info">
                        <span>16 levers de soleil </span>
                        <span>Documentary</span>
                        <span>117 min</span>
                    </div>
                </div>
                <div class="movie" data-id="19">
                    <img src="images/posters/19.jpg" alt="Manou the Swift">
                    <div class="info">
                        <span>Manou the Swift</span>
                        <span>Animation</span>
                        <span>88 min</span>
                    </div>
                </div>
                <div class="movie" data-id="24">
                    <img src="images/posters/24.jpg" alt="Burning">
                    <div class="info">
                        <span>Burning</span>
                        <span>Drama</span>
                        <span>148 min</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="controls">
            <button class="control_left">&#10094;</button>
            <button class="control_right">&#10095;</button>
        </div>
    </section>
@endsection

@push('script')
    <script  src='{{ asset('js/client/javascript/slideshow.js') }}'></script>
    <script  src='{{ asset('js/client/javascript/slider.css') }}'></script>
    <script  src='{{ asset('js/client/javascript/pages/home.js') }}'></script>
@endpush
