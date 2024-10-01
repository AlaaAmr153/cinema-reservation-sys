@extends('layouts.layout')
@section('title')
    Cinemas
@endsection
@push('style')
    <link rel='stylesheet' href='{{ asset('css/client/style/pages/cinemas.css') }}'>
@endpush

@section('content')
        <div>
            <img src="images/cinemas/banner.jpg" id='banner'>
        </div>

        <section>
            <div class='cinemas'>
                <a href="showtime.html">
                    <img src="images/cinemas/1.jpg">
                    <div>
                        <h1>
                            Luna Clementi<i data-icon='dolby'></i> </h1>
                        <p>3150 Commonwealth Avenue West</p>
                        <p>68129580</p>
                    </div>
                </a>
                <a href="showtime.html">
                    <img src="images/cinemas/2.jpg">
                    <div>
                        <h1>
                            Luna Bedok </h1>
                        <p>315 New Upper Changi Road</p>
                        <p>68467347</p>
                    </div>
                </a>
                <a href="showtime.html">
                    <img src="images/cinemas/3.jpg">
                    <div>
                        <h1>
                            Luna Orchard<i data-icon='imax'></i> </h1>
                        <p>2 Orchard Turn</p>
                        <p>68238801</p>
                    </div>
                </a>
                <a href="showtime.html">
                    <img src="images/cinemas/4.jpg">
                    <div>
                        <h1>
                            Luna Bayfront<i data-icon='imax'></i><i data-icon='dolby'></i> </h1>
                        <p>10 Bayfront Avenue</p>
                        <p>68018956</p>
                    </div>
                </a>
            </div>
        </section>
@endsection
