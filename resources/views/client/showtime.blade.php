@extends('layouts.layout')
@section('title')
    Showtimes
@endsection
@push('style')
    <link rel='stylesheet' href='{{ asset('css/client/style/pages/showtime.css') }}'>
@endpush
@section('content')
    {{-- movies --}}
    <section class="hor_container">
        <div class="ver_tab">
            @foreach ($movies as $movie)
                <button id="dead_top_left">&nbsp;</button>
                <button class="{{ $movie->id === $selectedMovieId ? 'active' : '' }}"
                    onclick="clickMovieTab('{{ $movie->id }}')">
                    {{ $movie->title }}
                </button>
            @endforeach
        </div>

        {{-- cinemas --}}
        <div class="ver_container">
            <!-- Cinemas Tabs different cinemas locations -->
            <div class="hor_tab">
                @foreach ($cinemas as $cinema)
                    <button class="{{ $cinema->id == $selectedCinema->id ? 'active' : '' }}"
                        onclick="clickCinemaTab('{{ $cinema->id }}')">
                        {{ $cinema->cinema_name }}
                    </button>
                @endforeach
            </div>

            {{-- showtimes --}}
            <div id="showtime_table">
                <p>Available showtimes</p>
                @if ($selectedCinema)
                  @foreach ($selectedCinema->screen as $screen)
                        @foreach ($screen->showtime as $showtime)
                            @if ($showtime->movie_id == $selectedMovieId)
                                <div class="day_showtime">
                                    <p>{{ \Carbon\Carbon::parse($showtime->show_date)->format('l, d/m/Y') }}</p>
                                    <div>
                                        <button onclick="selectSlot('{{ $showtime->id }}')">{{ $showtime->show_time }}</button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                @else
                <p>No showtimes available for this cinema.</p>
            @endif

            </div>
        </div>
    </section>



    <section class="movie">

        <div class="wrapper" onclick="location.href=''">
            <a href="{{ route('client.movie', ['id' => $movie->id]) }}">
            <img src="{{ asset($selectedMovie->poster) }}" alt="{{ $selectedMovie->title }}>">
        </a>
        </div>
        <h2>{{ $selectedMovie->title }}</h2>
        <p>{{ $selectedMovie->duration }}</p>
        <p>{{ $selectedMovie->genre }}</p>
    </section>
@endsection

@push('script')
    <script type='application/javascript' src='{{ asset('js/client/javascript/pages/showtime.js') }}'></script>
@endpush
