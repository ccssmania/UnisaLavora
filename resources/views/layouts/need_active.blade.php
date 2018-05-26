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
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-fixed-top" >
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">@lang('general.login.login')</a></li>
                            <li><a href="{{ route('register') }}">@lang('project.register')</a></li>
                        @else

                                        
                                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Notifications <span class=""> <i data-count="{{$unread}}" class="glyphicon glyphicon-bell notification-icon"></i> </span>
                                </a>

                                <ul class="dropdown-menu dropdown-alerts"  role="menu">
                                    <li class="dropdown-header " > Notifications {{$unread}}</li>
                                    <li class="divider"></li>
                                    @if(isset($notifications))
                                        @foreach($notifications as $notification)
                                            <li>
                                                <a href="{{$notification->data['type'] === 'confirm_activate' ? '#' : url('/notification/'.$notification->data['type'].'/'.$notification->id)}}">
                                                    <div>
                                                        <i class="fa fa-{{$notification->data['type']=== 'confirm_activate' ? 'check-circle' : 'bell'}} fa-fw"></i> {{$notification->data['name']}}
                                                        <span class="pull-right text-muted small">{{$notification->created_at}}</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="divider"></li>
                                            @php
                                                if($notification->data['type']=== "confirm_activate"){
                                                    $notification->markAsRead();
                                            }
                                            @endphp
                                        @endforeach
                                    @endif
                                    <li class="divider"></li>
                                    <li class="dropdown-header"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span>{{ Auth::user()->user->name }} </span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{url('/perfil')}}">Perfil</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout <span class="caret"></span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
                                @lang('project.language') <span class="caret"></span>
                            </a> 
                            <ul class="dropdown-menu"  role="menu">
                                <li>
                                    <a href="{{url('/language/spanish')}}">@lang('project.spanish')</a>
                                    <a href="{{url('/language/english')}}">@lang('project.english')</a>
                                    <a href="{{url('/language/italian')}}">@lang('project.italian')</a>
                                </li>
                            </ul>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div style="margin-top: 50px;">
            @if(Session::has('message'))
            <p class="alert alert-success">{!! Session::get('message') !!}</p>
            @endif

            @if(Session::has('errorMessage'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('errorMessage') }}</p>
            @endif
        </div>
        <div class="" style="margin-top: 80px;">
        
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ url('js/register.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ url('js/app.js') }}"></script>

</body>
</html>
