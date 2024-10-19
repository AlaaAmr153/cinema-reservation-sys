@extends('layouts.layout')
@section('title')
    Payment
@endsection
@push('style')
    <link rel='stylesheet' href='{{ asset('css/client/style/pages/payment.css') }}'>

@endpush
@section('content')
        <section class="left">
            <h2>payment summary</h2>
            <table>
                <thead>
                    <tr>
                        <td>Item</td>
                        <td>Price</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{$seat->seat_code}} --}}
                    <tr class='header expanded' onclick='this.classList.toggle("expanded")'>
                        <td>Movie - {{$movie->title }}</td>
                        <td>per seat - </td>
                        <td><i class="fa-solid fa-trash text-lg"
                            style="color: #ff0000;"></i></td>
                    </tr>
                    <tr class='sub'>
                        <td colspan='3'>{{$cinema->cinema_name}}</td>
                    </tr>
                    <tr class='sub'>
                        <td colspan='3'>{{ $showtime->show_date }} - {{ $showtime->show_time }}</td>
                    </tr>
                    <tr class='sub'>
                        <td colspan='3'>
                            <ul>
                                @foreach ($seats as $seat)
                                    <li>{{ $seat }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total Price: </td>
                        {{-- <td>{{ $totalPrice }} </td> --}}
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </section>

        <section class="right">
            <p class="warning"><span>Please fill the form!</span> <i
                    onclick="this.parentElement.style.display='none'">&times;</i></p>
            <form action="" id="payment" name="profile">
                <input type="text" placeholder="Your Name" name="name" id="name" required>
                <input type="email" placeholder="Email Address" name="email" id="email" required>
            </form>
            <p>Please select a payment method:</p>
            <div class="payments">
                <input type="radio" name="method" id="visa" hidden checked form="payment" required>
                <label class="payment" for="visa">
                    <i data-icon="visa"></i>
                    <span>VISA</span>
                </label>
                <input type="radio" name="method" id="mastercard" hidden form="payment" required>
                <label class="payment" for="mastercard">
                    <i data-icon="mastercard"></i>
                    <span>Mastercard</span>
                </label>
                <input type="radio" name="method" id="paypal" hidden form="payment" required>
                <label class="payment" for="paypal">
                    <i data-icon="paypal"></i>
                    <span>Paypal</span>
                </label>
                <input type="radio" name="method" id="credit" hidden form="payment" required>
                <label class="payment" for="credit">
                    <i data-icon="credit"></i>
                    <span>Credit Card</span>
                </label>
            </div>
            <button class="raised-button primary pay-button" disabled>confirm</button>
        </section>
@endsection

@push('script')
    <script src="{{ asset('js/client/javascript/pages/payment.js') }}"></script>
@endpush
