@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
            

        <div class="container">

            <div class="row">

                <div class="col-md-9 col-md-offset-1">

                    
                    <div class="text-center tipo">
                        <h3> Candidates </h3>
                    </div>
                    <div class="row clearfix">
                        @foreach($users as $user)
                            @include("candidates.show")
                        @endforeach
                    </div>

                    <div class="text-center">
                        {{$users->links()}}
                    </div>

                </div>

            </div>

        </div>
@endsection
        <!-- /.container -->
