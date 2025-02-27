<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
