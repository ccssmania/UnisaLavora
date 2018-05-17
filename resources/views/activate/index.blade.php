@extends("layouts.app")
@section("content")
	<div class="big-padding text-center blue-grey white-text">
		<h1>@lang("project.candidates")</h1>
	</div>
	<div class="container">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>@lang("project.name")</th>
					<th>@lang("project.email")</th>
					<th>@lang("project.phone_number")</th>
					<th>@lang("project.address")</th>
					<th>@lang("project.action")</th>
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
							@include('activate.activate',['url' => url('/activate/'.$user->id)])
							@include('activate.ignore',['url' => url('/activate/ignore/'.$user->id)])
						</td>
					</tr>
				@endforeach
				
			</tbody>
		</table>
	</div>
@endsection