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
                    <h3>{{ auth()->user()->name }}</h3>
                    <p>{{ auth()->user()->email }}</p>
                </div>
                <i data-icon="avatar"></i>
                <hr>
            </div>
        </section>

        <section class="bookings">
            <div class='upcoming'>
                <h1 data-count='{{ auth()->user()->upcomingReservations()->count() }} booking'><span>Upcoming</span></h1>
                @if (auth()->user()->upcomingReservations()->count() > 0)
                    <table>
                        <thead>
                            <tr>
                                <td>Movie</td>
                                <td>Cinema</td>
                                <td>Screen</td>
                                <td>Show Date</td>
                                <td>Show Time</td>
                                <td>Seats</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->upcomingReservations() as $reservation)
                                <tr>
                                    <td>{{ $reservation->movie->title }}</td>
                                    <td>{{ $reservation->screen->cinema->cinema_name }}</td>
                                    <td>{{ $reservation->screen->screen_code }}</td>
                                    <td>{{ $reservation->showtime->show_date }}</td>
                                    <td>{{ $reservation->showtime->show_time }}</td>
                                    <td>{{ $reservation->seat->seat_code }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No upcoming reservations.</p>
                @endif
            </div>

            <div class='past'>
                <h1 data-count='{{ auth()->user()->pastReservations()->count() }} booking'><span>Past</span></h1>
                @if (auth()->user()->pastReservations()->count() > 0)
                    <table>
                        <thead>
                            <tr>
                                <td>Movie</td>
                                <td>Cinema</td>
                                <td>Screen</td>
                                <td>Show Date</td>
                                <td>Show Time</td>
                                <td>Seats</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->pastReservations() as $reservation)
                                <tr>
                                    <td>{{ $reservation->movie->title }}</td>
                                    <td>{{ $reservation->screen->cinema->cinema_name }}</td>
                                    <td>{{ $reservation->screen->screen_code }}</td>
                                    <td>{{ $reservation->showTime->show_date }}</td>
                                    <td>{{ $reservation->showTime->show_time }}</td>
                                    <td>{{ $reservation->seat->seat_code }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No past reservations.</p>
                @endif
            </div>

            <div class="recomm">
                <h1 data-count="{{ auth()->user()->getRecommendedMovies()->count() }} movie"><span>Recommend</span></h1>
                <div class="slider">
                    <div class="container">
                        @foreach (auth()->user()->getRecommendedMovies() as $movie)
                            <div class="movie" data-id="{{ $movie->id }}">
                                @if (Storage::disk('public')->exists($movie->poster))
                                    <img src="{{ asset('storage/' . $movie->poster) }}">
                                @else
                                    <img src="{{ asset($movie->poster) }}">
                                @endif
                                <div class="info">
                                    <span>{{ $movie->title }}</span>
                                    <span>{{ implode(', ', $movie->moviegenre->pluck('genre')->toArray()) }}</span>
                                    <span>{{ $movie->duration }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- <div class="controls">
                    <button class="control_left">&#10094;</button>
                    <button class="control_right">&#10095;</button>
                </div> --}}
            </div>
        </section>
    </main>
@endsection

@push('script')
    <script type='application/javascript' src={{ asset('js/client/javascript/pages/user.js') }}></script>
@endpush
