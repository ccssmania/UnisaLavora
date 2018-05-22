<!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="{{url('/')}}" class="logo"><b> {{config('app.name', 'Laravel')}} </b></a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-fixed-top"  role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <!-- /.messages-menu -->

                        <!-- Authentication Links -->
                        
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">@lang('general.login.login')</a></li>
                            <li><a href="{{ route('register') }}">@lang('project.register')</a></li>
                        @else

                                        
                                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Notifications <span > <i data-count="{{$unread}}" class="glyphicon glyphicon-bell notification-icon"></i> </span><span class="caret"> </span>
                                </a>

                                <ul class="dropdown-menu dropdown-alerts"  role="menu">
                                    <li class="dropdown-header " > Notifications <span class="text-red"> {{$unread}}</span> </li>
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
                                    {{ Auth::user()->user->name }}<span class="caret"> </span>
                                </a>

                                <ul class="dropdown-menu " role="menu">
                                    <li><a href="{{url('/perfil')}}">Perfil</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
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
                                @lang('project.language')<span class="caret"> </span> 
                            </a>
                            <ul class="dropdown-menu "  role="menu">
                                <li>
                                    <a href="{{url('/language/spanish')}}">@lang('project.spanish')</a>
                                    <a href="{{url('/language/english')}}">@lang('project.english')</a>
                                    <a href="{{url('/language/italian')}}">@lang('project.italian')</a>
                                </li>
                            </ul>

                        </li>
                        <!--
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>-->

                       
                        <!-- User Account Menu -->
                        
                    </ul>
                </div>
            </nav>
        </header>