@extends('layouts.layout')
@section('title')
    Showtimes
@endsection
@push('style')
    <link rel='stylesheet' href='{{ asset('css/client/style/pages/showtime.css') }}'>
@endpush
@section('content')
        <section class="hor_container"></section>
        <section class="movie"> </section>
@endsection

@push('script')
    <script type='application/javascript' src='{{ asset('js/client/javascript/pages/showtime.js') }}'></script>
@endpush
