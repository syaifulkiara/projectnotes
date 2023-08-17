<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('templates/auth/plugins/images/favicon.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="{{ asset('templates/auth/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- ===== Animation CSS ===== -->
    <link href="{{ asset('templates/auth/css/animate.css')}}" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="{{ asset('templates/auth/css/style.css')}}" rel="stylesheet">
</head>

<body class="mini-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                @yield('content')
            </div>
        </div>
    </section>
    <script src="{{ asset('templates/auth/plugins/components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('templates/auth/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('templates/auth/js/sidebarmenu.js')}}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ asset('templates/auth/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('templates/auth/js/waves.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('templates/auth/js/custom.js')}}"></script>
    <!--Style Switcher -->
    <script src="{{ asset('templates/auth/plugins/components/styleswitcher/jQuery.style.switcher.js')}}"></script>
</body>

</html>
