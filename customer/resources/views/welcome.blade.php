<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css')}}">
        <style type="text/css">
            html, body {
                background-image: url({{asset('img/pict8.jpg')}});
                background-size: cover;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background-attachment: fixed; 
                align-items: center;
                display: grid;
                justify-content: center;
            }
        </style>
    </head>
    <body >
        <div class="container">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" style="color: white">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <b>Pieter</b><b style="color: green">Solution</b>
                </div>

            </div>
        </div>
    </body>
</html>
