@extends('layouts.layout')
@section('title')
    Movies
@endsection
@push('style')
    <link rel='stylesheet' href='{{ asset('css/client/style/pages/movies.css') }}'>
@endpush

@section('content')

        <section class="top">
            <form name="filters">
                <label for="genre" class="select" data-icon-before="genre"><span>Choose Genre</span></label>
                <input type="text" id="genre" name="genre" hidden>
                <label for="region" class="select" data-icon-before="region"><span>Choose Region</span></label>
                <input type="text" id="day" name="region" hidden>
                <label for="rating" class="select" data-icon-before="child"><span>Choose Rating</span></label>
                <input type="text" id="rating" name="rating" hidden>
                <label for="sort" class="select" data-icon-before="sort"><span>Sorting</span></label>
                <input type="text" id="sort" name="sort" hidden>
            </form>
        </section>
        <section class="bottom">
            <form action="{{route('movies.clientIndex')}}" method="get">
            <div class="movies">
                @foreach ($movies as $movie)
                <div class="movie">
                      <a href={{route('client.movie',['id'=>$movie->id]) }}>
                    <div class="wrapper" data-id="{{$movie->id}}" data-genre="" data-rating="R">
                        <img src="{{asset($movie->poster)}}" class="loading" alt="{{$movie->title}}">
                    </div>
                    <h4>{{$movie->title}}</h4>
                    <p>{{$movie->duration}}</p>
                </div>
                @endforeach
            </div>
        </form>
        </section>
@endsection

@push('script')
    <script type='application/javascript' src='{{ asset('js/client/javascript/pages/movies.js') }}'></script>
@endpush
