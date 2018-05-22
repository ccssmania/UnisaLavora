@extends('layouts.app')
@section('header_title',trans('project.dashboard'))

@section('content')
<div class="flex-center position-ref full-height">
            

        <div class="container">

            <div class="row">

                <div class="col-md-9 ">

                    
                    <div class="text-center tipo">
                        @if(Auth::user()->roll == 0)
                            <h3>@lang('project.cc')</h3>
                        @elseif(Auth::user()->roll == 1)
                            <h3>@lang('project.candidates')</h3>
                        @else
                            <h3>@lang('project.companies')</h3>
                        @endif
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
</div>
@endsection
        <!-- /.container -->
