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
                <div class="slideshow" data-delay="2000" data-speed="500">
                    <figure>
                        @foreach ($movie->movie_image as $image)
                            <img data-src="{{ asset($image->img) }}">
                        @endforeach
                    </figure>
                </div>
                <div id='text_container'>
                    <p id='movie_name'>{{ $movie->title }}</p>
                    <hr>
                    <p id='tab_name'>Overview</p>
                    <div id='description' >
                        <p>{{ $movie->description }}</p>
                    </div>
                    <div id='overview_text' style="display:none">
                        <p>{{ $movie->description }}</p>
                    </div>
                    <div id="details_text" style="display:none">
                        <table>
                            <tr>
                                <td>release_date: {{ $movie->release_date }}</td>
                                <td>duration: {{ $movie->duration}}</td>
                            </tr>
                            <tr>
                                <td>Rating: {{ $movie->rating }}</td>
                                <td>trailer: {{ $movie->trailer_url }}</td>

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
            </section>
        </main>
    @endsection

    @push('script')
        <script type='application/javascript' src={{ asset('js/client/javascript/pages/movie.js') }}></script>
    @endpush
