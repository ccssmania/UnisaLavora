@extends('layouts.app')
@section('header_title',trans('project.candidates'))
@section('header_description',trans('project.interviews'))
@section('content')	
	<div class="box box-solid box-{{$oferta->status == 0 ? 'danger' : 'primary'}}" style="width: 25rem; min-width: 100%;margin-top: 40px; min-height: 100%">
		<div class="box-header"> {{$oferta->title}}  @if(file_exists(storage_path('app/ofr/'.$oferta->id.'.pdf')))
	        	<a target="_blank" href="{{url('/ofr/'.$oferta->id.'.pdf')}}">@lang('project.ofert')</a> @endif
			
		 </div>
		
		<div class="box-body">
			<h2 class="text-center"> @lang('project.candidates') </h2>
			<table class="table table-bordered">
                <thead>
                    <tr>                          
                        <th>@lang('project.name')</th>
                        <th>@lang('project.email')</th>
                        <th>@lang('project.phone')</th>
                        <th>@lang('project.address')</th>
                        <th>ID</th>
                        <th>CV</th>
                        <th>@lang('project.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($interviews as $interview)
                    <tr>	                            
                        <td>{{ $interview->user->user->name }}</td>
                        <td>{{ $interview->email }}</td>
                        <td>{{ $interview->user->phone }}</td>
                        <td>{{ $interview->user->user->address }}</td>
                        <td>{{ $interview->user->id}}</td>
                        <td>
	                    	@if(file_exists(storage_path('app/cvs/'.$interview->user->id.'.pdf')))
	                    		<a target="_blank" href="{{url('/cvs/'.$interview->user->id.'.pdf')}}">CV</a>
	                    	@else
	                    		<div class="has-error">
	                    			<span class="help-block">
                                        <strong>CV : @lang('project.dnf')</strong>
                                    </span>
	                    		</div>
	                    	@endif </td>
                        <td>
                            @include('interview.accept', ['url' => url('/interview/accept/'.$interview->user->id.'/'.$oferta->id), 'method' => 'GET'])
                            <a href="{{url('/interview/delete/'.$interview->user->id.'/'.$oferta->id)}}" class="btn btn-warning">@lang('project.reject')</a>
                        </td>
                    </tr>	

                    @endforeach
                </tbody>

            </table>
            {{$interviews->links()}}
		</div>
		
	</div>
	@endsection