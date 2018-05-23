@extends('layouts.app')
@section('header_title',trans('project.candidates'))
@section('header_description',trans('project.interviews'))
@section('content')	
	<div class="box box-solid box-{{$oferta->status == 0 ? 'danger' : 'primary'}}" style="width: 25rem; min-width: 100%; min-height: 100%">
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
                        <th>@lang('project.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>	                            
                        <td>{{ $user->user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->user->phone }}</td>
                        <td>{{ $user->user->address }}</td>
                        <td>{{ $user->user->id}}</td>
                        <td>
	                    	@if(file_exists(storage_path('app/cvs/'.$user->id.'.pdf')))
	                    		<a target="_blank" href="{{url('/cvs/'.$user->id.'.pdf')}}">CV</a>
	                    	@else
	                    		<div class="has-error">
	                    			<span class="help-block">
                                        <strong>CV : @lang('project.dnf')</strong>
                                    </span>
	                    		</div>
	                    	@endif </td>
                        <td>
                            <a class="btn btn-primary" href="" >Edit</a>                                
                            <a class="btn btn-primary" href="" >Full Report</a>
                            <a class="btn btn-primary" href="" >Admin images</a>
                        </td>
                    </tr>	

                    @endforeach
                </tbody>

            </table>
            {{$users->links()}}
		</div>
		
	</div>
	@endsection