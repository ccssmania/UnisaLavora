@extends('layouts.app')

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
                            Please wait for the activation account!
                        @else
                            You are Logged!
                        @endif
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
