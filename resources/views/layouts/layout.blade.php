<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- css files --}}
    <link rel="stylesheet" href="{{ asset('css/client/style/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/client/style/login.css') }}">
    @stack('style')
</head>
<body>

    @extends('layouts.login')
    @extends('layouts.navbar')

    <main>
    @yield('content')
    </main>

    <footer>
        <p>Luna Cinema Pte Ltd &copy; 2018</p>
    </footer>

    {{-- javascript files --}}
    <script src="{{ asset('js/client/javascript/login.js') }}"></script>
    @stack('script')
</body>
</html>
