<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @include("partials.head")
</head>
<body class="skin-blue">
    <div class="wrapper">
        <!--Header -->
        @include("partials.header")
        @include("partials.sidbar")
        <div class="content-wrapper body">
            @if(Session::has('message'))
            <p class="alert alert-success">{!! Session::get('message') !!}</p>
            @endif

            @if(Session::has('errorMessage'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('errorMessage') }}</p>
            @endif
            @yield('content')
        </div>
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright © 2015 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>
    </div>
        

    <!-- Scripts -->
    
    
    @include("partials.jsfiles")
</body>
</html>
