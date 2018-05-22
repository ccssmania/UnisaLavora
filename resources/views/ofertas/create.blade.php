@extends("layouts.app")
@section("header_title", trans('project.create'))
@section("header_description", trans('project.c_n_o'))
@section("content")
	<div class="container white"> 
		@include('ofertas.form',['url' => url('/oferts/create/'.$user->id), 'method' => 'POST'])
	</div>
@endsection