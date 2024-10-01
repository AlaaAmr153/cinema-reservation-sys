@extends('layouts.layout')
@section('title')
    User Info
@endsection
@push('style')
    <link rel='stylesheet' href='{{ asset('css/client/style/pages/user.css') }}'>
@endpush
@section('content')
    <main>
        <section class="user_header">
            <div class="user_profile">
                <div class="user_info">
                    <h3>user</h3>
                    <p>email</p>
                </div>
                <i data-icon="avatar"></i>
                <hr>
            </div>
        </section>
        <section class="bookings">
            <div class='upcoming'>
                <h1 data-count='0 booking'><span>Upcoming</span></h1>
            </div>
            <div class='past'>
                <h1 data-count='0 booking'><span>Past</span></h1>
            </div>
            <div class="recomm">
                <h1 data-count="1 movie"><span>recommend</span></h1>
                <div class="slider">
                    <div class="container">
                        <div class="movie" data-id="4">
                            <img src="./images/posters/0.jpg" alt="Mission: Impossible - Fallout">
                            <div class="info">
                                <span>Movie</span>
                                <span>Genre</span>
                                <span>Duration</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="controls">
                    <button class="control_left">&#10094;</button>
                    <button class="control_right">&#10095;</button>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('script')
    <script type='application/javascript' src={{ asset('js/client/javascript/pages/user.js') }}></script>
@endpush
