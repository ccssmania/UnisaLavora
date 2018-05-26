        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        
                         <img src="{{url('images/small/'.Auth::user()->id.'.jpg')}}" onerror="this.src='{{url('images/small/perfil.png')}}';" class="img-circle" alt="User Image" />
                        
                    </div>
                    <div class="pull-left info">
                        <p>{{Auth::user()->user->name}}</p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree" >
                    <li class="header">@lang('project.menu')</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="{{Route::getCurrentRoute()->getActionName() == "App\Http\Controllers\HomeController@home" ? 'active' : ''}}">
                        <a href="{{url('/')}}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    <li class="{{Route::getCurrentRoute()->getActionName() == "App\Http\Controllers\PerfilController@index" ? 'active' : ''}}">
                        <a href="{{url('/perfil')}}"><i class="fa fa-user"></i><span>Perfil</span></a></li>
                    @if(Auth::user()->roll == env("COMPANY"))
                        <li class="{{explode('@',Route::getCurrentRoute()->getActionName())[0] == "App\Http\Controllers\OfertaController" ? 'active' : ''}}">
                            <a href="{{url('/oferts/'.Auth::user()->id)}}"><i class="fa fa-user"></i><span>@lang('project.oferts') </span></a></li>
                    @endif
                    @if(Auth::user()->roll == env("STUDENT"))
                        <li class="{{Route::getCurrentRoute()->getActionName() == "App\Http\Controllers\StudentController@index" ? 'active' : ''}}">
                            <a href="{{url('/my_requests/'.Auth::user()->id)}}"><i class="fa fa-paper-plane"></i><span>@lang('project.my_requests') </span></a></li>
                    @endif
                    @if(Auth::user()->roll == env("ADMINISTRATOR"))
                        <li class="{{Route::getCurrentRoute()->getActionName() == "App\Http\Controllers\HomeController@statistics" ? 'active' : ''}}">
                            <a href="{{url('/statistics')}}"><i class="fa fa-line-chart"></i><span>@lang('project.statistics')</span></a></li>
                    @endif
                    <!--<li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Link in level 2</a></li>
                            <li><a href="#">Link in level 2</a></li>
                        </ul>
                    </li>-->
                </ul><!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>