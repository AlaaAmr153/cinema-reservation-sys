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
                        <td>per seat : {{$seatCost}} $ </td>
                        <td><i class="fa-solid fa-trash text-lg"
                            style="color: #ff0000;"></i></td>
                    </tr>
                    <tr class='sub'>
                        <td colspan='3'><span style="color: white">Cinema :</span> {{$cinema->cinema_name}}</td>
                    </tr>
                    <tr class='sub'>
                        <td colspan='3'><span style="color: white">Date :</span> {{ $showtime->show_date }} - {{ $showtime->show_time }}</td>
                    </tr>
                    <tr class='sub'>
                        <td colspan='3'>
                            <ul>
                                @foreach ($seats as $seat)
                                    <li><span style="color:white">Seat :</span> {{ $seat }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total Price: </td>
                        <td>{{ $totalCost }} $</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </section>

        <section class="right">
            <p class="warning"><span>Please fill the form!</span> <i
                    onclick="this.parentElement.style.display='none'">&times;</i></p>
            <form action="{{route('payments.finalizeBooking')}}" method="post" >
                @csrf
                <div id="payment" name="profile">
                <input type="text" placeholder="Your Name" name="name" id="name" required>
                <input type="email" placeholder="Email Address" name="email" id="email" required>
            </div>

            <p>Please select a payment method:</p>
            <div class="payments">
                <input type="radio" name="method" id="visa" hidden checked form="payment" value="visa" required>
                <label class="payment" for="visa">
                    <i class="fa-brands fa-cc-visa" style="font-size: 55px; color:#f0a500"></i>
                    <span>VISA</span>
                </label>
                <input type="radio" name="method" id="mastercard" hidden form="payment" value="master" required>
                <label class="payment" for="mastercard">
                    <i class="fa-brands fa-cc-mastercard" style="font-size: 55px; color:#f0a500 "></i>
                    <span>Mastercard</span>
                </label>
                <input type="radio" name="method" id="paypal" hidden form="payment" value="paypal" required>
                <label class="payment" for="paypal">
                    <i class="fa-brands fa-paypal" style="font-size: 55px; color:#f0a500; padding-left:10px"></i>
                    <span>Paypal</span>
                </label>
                <input type="radio" name="method" id="credit" hidden form="payment" value="credit" required>
                <label class="payment" for="credit">
                    <i class="fa-regular fa-credit-card" style="font-size: 55px; color:#f0a500"></i>
                    <span>Credit Card</span>
                </label>
            </div>
            <button class="raised-button primary pay-button" type="button" >confirm</button>
        </form>
        </section>
@endsection

@push('script')
    <script src="{{ asset('js/client/javascript/pages/payment.js') }}"></script>
@endpush
