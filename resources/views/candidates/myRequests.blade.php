@extends("layouts.app")
@section('header_title',trans('project.my_requests'))
@section("content")
	<div class="big-padding text-center blue-grey white-text">
		<h1>@lang("project.my_requests")</h1>
	</div>
	<div class="">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>@lang("project.title")</th>
					<th>@lang("project.description")</th>
					<th>@lang("project.company")</th>
					<th>@lang("project.document")</th>
					<th>@lang("project.action")</th>
				</tr>
			</thead>
			<tbody>
				@foreach($interviews as $interview)
					<tr>
						<td> {{$interview->oferta->title}} </td>
						<td>{!!$interview->oferta->description!!}</td>
						<td> {{$interview->oferta->user->user->name}} </td>
						<td> @if(file_exists(storage_path('app/ofr/'.$interview->oferta->id.'.pdf')))
		        				<a target="_blank" href="{{url('/ofr/'.$interview->oferta->id.'.pdf')}}">@lang('project.ofert')</a>
		       				 @endif	
		    			</td>
						<td >

							@include('candidates.apply', ['url' => url("/apply/delete/".$interview->oferta->id.'/'.Auth::user()->id), 'method' => 'POST', 'oferta' => $interview->oferta])
						</td>
					</tr>
				@endforeach
				
			</tbody>
		</table>
	</div>
@endsection