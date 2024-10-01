@extends('layouts.layout')
@section('title')
    Movie
@endsection
@push('style')
    <link rel='stylesheet' href='{{ asset('css/client/style/pages/movie.css') }}'>
@endpush

@section('content')
    <main>
        <section class='top'>
            <div class='slideshow' data-delay='4000' data-speed='500'>
                <figure><img data-src='images/photos/9_1.jpg' data-target='' alt='Photo 1'><img
                        data-src='images/photos/9_2.jpg' data-target='' alt='Photo 2'><img data-src='images/photos/9_3.jpg'
                        data-target='' alt='Photo 3'></figure>
            </div>
            <div id='text_container'>
                <p id='movie_name'>Fantastic Beasts: The Crimes Of Grindelwald</p>
                <hr>
                <p id='tab_name'>Overview</p>
                <div id='description'>
                    <p>In an effort to thwart Grindelwald's plans of raising pure-blood wizards up to rule over all
                        non-magical beings, Albus Dumbledore enlists his former student Newt Scamander, who agrees to
                        help, unaware of the dangers that lie ahead. Lines are drawn as love and loyalty are tested,
                        even among the truest friends and family, in an increasingly divided wizarding world.</p>
                </div>
                <div id='overview_text' style='display:none'>
                    <p>In an effort to thwart Grindelwald's plans of raising pure-blood wizards up to rule over all
                        non-magical beings, Albus Dumbledore enlists his former student Newt Scamander, who agrees to
                        help, unaware of the dangers that lie ahead. Lines are drawn as love and loyalty are tested,
                        even among the truest friends and family, in an increasingly divided wizarding world.</p>
                </div>
                <div id="details_text" style="display:none">
                    <table>
                        <tr>
                            <td>Genre: Adventure</td>
                            <td>Region: UK</td>
                        </tr>
                        <tr>
                            <td>Rating: PG-13</td>
                            <td>Length: 116min</td>
                        </tr>
                        <tr>
                            <td colspan='2'>Director: David Yates</td>
                        </tr>
                        <tr>
                            <td colspan='2'>Cast: Eddie Redmayne, Katherine Waterston, Dan Fogler
                            </td>
                        </tr>
                    </table>
                </div><button id='book_btn' class='dead_btn'>Coming Soon</button> <!-- </div> -->
            </div>
            {{-- <button id='overview_btn' onclick='return clickOverview()'>overview</button>
            <button id='details_btn' onclick='return clickDetails()'>details</button> --}}
        </section>
    @endsection

    @push('script')
        <script type='application/javascript' src={{ asset('js/client/javascript/pages/movie.js') }}></script>
    @endpush
