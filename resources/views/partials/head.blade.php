<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{url('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('AdminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
      <!-- Theme style -->
    <link rel="stylesheet" href="{{url('AdminLTE/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap-notifications.min.css')}}">
    <link rel="stylesheet" href="{{url('laravel.css')}}">
      <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
            page. However, you can choose any other skin. Make sure you
            apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{url('AdminLTE/dist/css/skins/skin-black.min.css')}}">
    <link rel="stylesheet" href="{{url('AdminLTE/dist/css/skins/skin-blue.min.css')}}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>