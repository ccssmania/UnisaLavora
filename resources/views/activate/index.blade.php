@extends("layouts.app")
@section("content")
	<div class="big-padding text-center blue-grey white-text">
		<h1>Candidates</h1>
	</div>
	<div class="container">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>E-mail</th>
					<th>Phone Number</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td> {{$user->user? $user->user->name : ''}} </td>
						<td>{{$user->email}}</td>
						<td> {{$user->user? $user->user->phone : '' }} </td>
						<td> {{$user->user ? $user->user->address : ''}} </td>
						<td >
							@include('activate.activate',['url' =>'/activate/'.$user->id])
							@include('activate.ignore',['url' =>'/activate/ignore/'.$user->id])
						</td>
					</tr>
				@endforeach
				
			</tbody>
		</table>
	</div>
@endsection