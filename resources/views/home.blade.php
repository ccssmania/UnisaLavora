@extends('layouts.need_active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-{{Auth::guest()? 'danger' : 'info'}}">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!Auth::guest())
                        @if(Auth::user()->active != 1)
                            @lang("project.wait_activation_p")
                        @else
                            @lang("project.logged")
                        @endif
                    @else
                        <li><a href="{{ route('login') }}">@lang("general.login.login") </a></li>
                        <li><a href="{{ route('register') }}">@lang("project.register") </a></li>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
