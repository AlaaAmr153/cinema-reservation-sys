@extends('layouts.layout')
@section('title')
    Cinemas
@endsection
@push('style')
    <link rel='stylesheet' href='{{ asset('css/client/style/pages/cinemas.css') }}'>
@endpush

@section('content')
        <div>
            <img src="{{ asset('images/site_images/cinemas/banner.jpg') }}" id='banner'>
        </div>

        <section>
            <div class='cinemas'>
                @foreach ($cinemas as $cinema )
                <a href="{{ route('showtimes.display_showtime', ['cinema_id' => $cinema->id, 'movie_id' => 1]) }}">
                    <img src="{{ asset($cinema->cinema_img) }}" alt="Cinema Image">
                    <div>
                        <h1>{{$cinema->cinema_name}}<i data-icon='dolby'></i> </h1>
                        <p>{{$cinema->location}}</p>
                        <p>{{$cinema->contact_number}}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </section>
@endsection

