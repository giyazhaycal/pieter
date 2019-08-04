<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PieterSolution</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <link rel="stylesheet" id="css-main" href="{{ asset('asset/css/oneui.css') }}"> --}}
    @yield('style')

</head>
<body >


    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    
    @yield('bottom_script')
</body>
</html>
