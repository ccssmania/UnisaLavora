@extends('layouts.app')
@section('header_title', trans('project.oferts'))
@section('content')
	<div class="flex-center position-ref full-height">
            

        <div class="container">

            <div class="row">

                <div class="col-md-9 ">

                    
                    <div class="text-center tipo">
                        <h3>{{$company->name}}</h3>
                        
                    </div>
                    <div class="row clearfix">
                        @foreach($ofertas as $oferta)
                            @include("ofertas.show_many")
                        @endforeach
                    </div>

                    <div class="text-center">
                        {{$ofertas->links()}}
                    </div>

                </div>

            </div>

        </div>
	</div>
	@if(Auth::user()->id == $company->user->id)
		<div class="floating">
			<a href="{{url('/oferts/create/'.Auth::user()->id)}}" class="btn btn-info btn-fab">
				<i class="material-icons">add</i>
			</a>
		</div>
	@endif
@endsection