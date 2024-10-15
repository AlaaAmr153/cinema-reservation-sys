@extends('layouts.layout')
@section('title')
    Contact
@endsection

@push('style')
    <link rel='stylesheet' href='{{ asset('css/client/style/pages/contact.css') }}'>
@endpush
@section('content')

        <section class='top'>
            <div>
                <h1>Contact Us</h1>
                <div id="contact_outer">
                    <img src="{{ asset('images/site_images/building.jpg') }}">
                    <div id="contact_inner">
                        <p data-icon-before="location" class="icon">Napaj, Otoykihsiju, Singapore 611-0002</p>
                        <p data-icon-before="phone" class="icon">+65 8888 8888</p>
                        <a href="mailto:contact@luna.com">
                            <p data-icon-before="mail" class="icon">contact@luna.com</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <div id="feedback">
            <div>
                <h1>We Value your Feedback</h1>
                @if(session('success'))
                    <div class="p-2 bg-green-300 rounded my-2 mt-4">{{ session('success') }}</div>
                @endif

                <form action="{{ route('feedbacks.store') }}" method="POST" >
                    @csrf

                    <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}"><br>
                    @error('name')
                        <div class="p-2 bg-red-300 rounded my-2">{{ $message }}</div>
                    @enderror

                    <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}"><br>
                    @error('email')
                        <div class="p-2 bg-red-300 rounded my-2">{{ $message }}</div>
                    @enderror

                    <textarea rows="10" name="feedback" placeholder="What you want us to know...">{{ old('feedback') }}</textarea>
                    @error('feedback')
                        <div class="p-2 bg-red-300 rounded my-2">{{ $message }}</div>
                    @enderror

                    <button class="primary raised-button" type="submit">Submit</button>
                </form>
            </div>
        </div>
@endsection
