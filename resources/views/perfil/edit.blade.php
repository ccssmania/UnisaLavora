@extends("layouts.app")

@section("content")
	<div class="container white"> 
		<h1>Edit</h1>
		@include('perfil.form',['url' => '/perfil/edit/'.$user->id, 'method' => 'POST'])
	</div>
@endsection