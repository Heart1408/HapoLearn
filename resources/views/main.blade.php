<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>HapoLearn</title>
</head>

<body>
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')
    @include('layouts.login_register')
    @include('layouts.messenger')
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</body>

</html>
