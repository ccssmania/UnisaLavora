        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        @if(Auth::user()->roll == 0)
                            <img src="{{url('images/small/perfil.png')}}" class="img-circle" alt="User Image" />
                        @else
                            <img src="{{url('images/small/$user->id.jpg')}}" onerror="this.src='{{url('images/small/perfil.png')}}';" class="img-circle" alt="User Image" />
                        @endif
                    </div>
                    <div class="pull-left info">
                        <p>{{Auth::user()->user->name}}</p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="header">Menu</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="{{Route::getCurrentRoute()->getActionName() == "App\Http\Controllers\HomeController@home" ? 'active' : ''}}"><a href="{{url('/')}}"><span>Dashboard</span></a></li>
                    <li class="{{Route::getCurrentRoute()->getActionName() == "App\Http\Controllers\PerfilController@index" ? 'active' : ''}}"><a href="{{url('/perfil')}}"><span>Perfil</span></a></li>

                    <li><a href="#"><span>Another Link</span></a></li>
                    <li class="treeview">
                        <a href="#"><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#">Link in level 2</a></li>
                            <li><a href="#">Link in level 2</a></li>
                        </ul>
                    </li>
                </ul><!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>