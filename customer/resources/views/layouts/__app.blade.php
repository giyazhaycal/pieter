<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('asset/img/favicons/apple-touch-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('asset/img/favicons/apple-touch-icon-60x60.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('asset/img/favicons/apple-touch-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('asset/img/favicons/apple-touch-icon-76x76.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('asset/img/favicons/apple-touch-icon-114x114.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('asset/img/favicons/apple-touch-icon-120x120.png')}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('asset/img/favicons/apple-touch-icon-144x144.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('asset/img/favicons/apple-touch-icon-152x152.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('asset/img/favicons/apple-touch-icon-180x180.png')}}">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('asset/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/js/plugins/select2/select2.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/js/plugins/select2/select2-bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/js/plugins/ion-rangeslider/css/ion.rangeSlider.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/js/plugins/dropzonejs/dropzone.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/js/plugins/jquery-tags-input/jquery.tagsinput.min.css')}}">
        <!-- Bootstrap and OneUI CSS framework -->
        <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css')}}">
        <link rel="stylesheet" id="css-main" href="{{ asset('asset/css/oneui.css')}}">
        @yield('style')
    </head>
    <body>
        @include('partials.header')
        @yield('content')
        
        <script src="{{ asset('asset/js/core/jquery.min.js')}}"></script>
        <script src="{{ asset('asset/js/core/bootstrap.min.js')}}"></script>
        <script src="{{ asset('asset/js/core/jquery.slimscroll.min.js')}}"></script>
        <script src="{{ asset('asset/js/core/jquery.scrollLock.min.js')}}"></script>
        <script src="{{ asset('asset/js/core/jquery.appear.min.js')}}"></script>
        <script src="{{ asset('asset/js/core/jquery.countTo.min.js')}}"></script>
        <script src="{{ asset('asset/js/core/jquery.placeholder.min.js')}}"></script>
        <script src="{{ asset('asset/js/core/js.cookie.min.js')}}"></script>
        <script src="{{ asset('asset/js/app.js')}}"></script>

        <!-- Page JS Plugins -->
        <script src="{{ asset('asset/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{ asset('asset/js/plugins/bootstrap-datetimepicker/moment.min.js')}}"></script>
        <script src="{{ asset('asset/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="{{ asset('asset/js/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{ asset('asset/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
        <script src="{{ asset('asset/js/plugins/select2/select2.full.min.js')}}"></script>
        <script src="{{ asset('asset/js/plugins/masked-inputs/jquery.maskedinput.min.js')}}"></script>
        <script src="{{ asset('asset/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js')}}"></script>
        <script src="{{ asset('asset/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
        <script src="{{ asset('asset/js/plugins/dropzonejs/dropzone.min.js')}}"></script>
        <script src="{{ asset('asset/js/plugins/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>
        <!-- Page JS Code -->
        <script src="{{ asset('asset/js/pages/base_forms_pickers_more.js')}}"></script>
        <script>
            jQuery(function () {
                // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins)
                App.initHelpers(['datepicker', 'datetimepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']);
            });
        </script>
        @yield('bottom_script')
    </body>
</html>