@extends("layouts.app")

@section("content")
	<div class="container white"> 
		<h1>@lang("project.edit") </h1>
		@include('perfil.form',['url' => url('/perfil/edit/'.$user->id), 'method' => 'POST'])
	</div>
@endsection