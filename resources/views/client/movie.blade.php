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
            {{-- <div class='slideshow' data-delay='4000' data-speed='500'> --}}
                <figure>

                    @foreach ($movie->movie_image as $image)

                    <img data-src="{{ asset( $image->img)  }}"  >
                @endforeach

                    </figure>
            </div>
            <div id='text_container' >
                <p id='movie_name'>{{ $movie->title }}</p>
                <hr>
                <p id='tab_name'>Overview</p>
                <div id='description' >
                    <p>{{ $movie->description}}</p>
                </div>
                <div id='overview_text' style="display:none">
                    <p>{{ $movie->overview }}</p>
                </div>
                <div id="details_text" style="display:none">
                    <table>
                        <tr>
                            <td>Genre: {{ $movie->genre }}</td>
                            <td>Region: {{ $movie->region }}</td>
                        </tr>
                        <tr>
                            <td>Rating: {{ $movie->rating }}</td>
                        <td>Length: {{ $movie->length }}min</td>

                        </tr>
                        <tr>
                            <td colspan='2'>Director:{{ $movie->director }}</td>
                        </tr>
                        <tr>
                            <td colspan='2'>Cast:{{ $movie->cast }}
                            </td>
                        </tr>
                    </table>
                </div><button id='book_btn' class='dead_btn'>Coming Soon</button>
            </div>
            {{-- <button id='overview_btn' onclick='return clickOverview()'>overview</button>
            <button id='details_btn' onclick='return clickDetails()'>details</button> --}}
        </section>
    @endsection

    @push('script')
        <script type='application/javascript' src={{ asset('js/client/javascript/pages/movie.js') }}></script>
    @endpush
