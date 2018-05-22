@extends("layouts.app")
@section("header_title", trans('project.edit'))
@section("header_description", trans('project.e_o'))
@section("content")
	<div class="container white"> 
		@include('ofertas.form',['url' => url('/oferts/edit/'.$user->id.'/'.$oferta->id), 'method' => 'POST'])
	</div>
@endsection