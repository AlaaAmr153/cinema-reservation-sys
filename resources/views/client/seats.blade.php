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

        <div class="seat-container">

        </div>
@endsection

@push('script')
<script>
    const showtimeId = '';
    const seatDataUrl = '{{ route('fetch.seat.data', ['showtimeId' => ':showtimeId']) }}'.replace(':showtimeId', showtimeId);
</script>
    <script type='application/javascript' src='{{ asset('js/client/javascript/pages/booking.js') }}'></script>
@endpush
