<!DOCTYPE html>
<html class="no-focus" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ env('app.name', 'Pieter') }}</title>

        <meta name="description" content="OneUI - Admin Dashboard Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        
        <!-- Stylesheets -->
        <!-- Web fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('asset/js/plugins/slick/slick.min.css') }}') }}">
        <link rel="stylesheet" href="{{ asset('asset/js/plugins/slick/slick-theme.min.css') }}') }}">

        <!-- Bootstrap and OneUI CSS framework -->
        <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
        <link rel="stylesheet" id="css-main" href="{{ asset('asset/css/oneui.css') }}">

    </head>
    <body>
    
        <main id="main-container">        
            <div class="content">
                <div class="col-md-4 col-md-offset-4" style="margin-top: 100px">
                    <!-- Bootstrap Lock -->
                    <div class="block block-themed">
                        <div class="block-header bg-primary">
                            <h3 class="block-title">Bootstrap</h3>
                        </div>

                        <div class="block-content" style="padding: 30px">
                            <div class="text-center push-10-t push-180">
                                <img class="img-avatar img-avatar96" src="{{ asset('asset/img/avatars/avatar4.jpg')}}" alt="">
                            </div>
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="col-xs-12">
                                        <label for="email" >E-Mail Address</label>
                                    </div>
                                    <div class="col-xs-12">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="col-xs-12">
                                        <label for="password" control-label">Password</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-sm btn-block">
                                            Login
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                
                    </div>
                    <!-- END Bootstrap Lock -->
                </div>
            
        </main>
    </div>

    <script src="{{ asset('asset/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/core/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('asset/js/core/jquery.scrollLock.min.js') }}"></script>
    <script src="{{ asset('asset/js/core/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('asset/js/core/jquery.countTo.min.js') }}"></script>
    <script src="{{ asset('asset/js/core/jquery.placeholder.min.js') }}"></script>
    <script src="{{ asset('asset/js/core/js.cookie.min.js') }}"></script>
    <script src="{{ asset('asset/js/app.js') }}"></script>

    <!-- Page Plugins -->
    <script src="{{ asset('asset/js/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/chartjs/Chart.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('asset/js/pages/base_pages_dashboard.js') }}"></script>
    <script>
        jQuery(function () {
            // Init page helpers (Slick Slider plugin)
            App.initHelpers('slick');
        });
    </script>
    </body>
</html>











{{-- 


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}