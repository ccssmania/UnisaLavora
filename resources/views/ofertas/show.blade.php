@extends('layouts.app')
@section('header_title',trans('project.ofert'))
@section('content')	
	<div class="col-md-9 col-md-offset-1 ">
		<div class="box box-solid box-{{$oferta->status == 0 ? 'danger' : 'primary'}}" style="width: 25rem; min-height: 500px; min-width: 750px;">
			<div class="box-header"> {{$oferta->title}}
				
			 </div>
			<div class="text-center">
				
			</div>
			<h3 class="text-center border-bot">@lang("project.description") </h3>
			<div class="tex-center col-md-10 col-md-offset-1">
				<h5>{!!$oferta->description!!}</h5>
			</div>
			<div class="box-body">
				@if(file_exists(storage_path('app/ofr/'.$oferta->id.'.pdf')))
		        	<a target="_blank" href="{{url('/ofr/'.$oferta->id.'.pdf')}}">@lang('project.ofert')</a>
		        @endif
			</div>
			<div class="box-footer text-center">
				@if(Auth::user()->id == $company->user->id )
		            <div class="text-right actions">
		                <a href="{{url('/oferts/'.$company->user->id.'/'. $oferta->id .'/edit')}}">
		                                @lang('project.edit')
		                </a>
		                @include('ofertas.delete')
		            </div>
		        @endif
		        @if(Auth::user()->roll == env("STUDENT"))
		        	@if(!$oferta->student(Auth::user()->id) || $oferta->student(Auth::user()->id)->status == 0 || !$oferta->student(Auth::user()->id)->satatus == 4)
		        		@include('candidates.apply', ['url' => $oferta->student(Auth::user()->id) ? url("/apply/delete/$oferta->id/".Auth::user()->id) : url("/apply/add/$oferta->id/".Auth::user()->id), 'method' => 'POST'])
		        
		        	@elseif($oferta->student(Auth::user()->id) && $oferta->student(Auth::user()->id)->status == 1)
		        		<h4 class="text-center">@lang('project.y_w_a') </h4>
		        	@elseif($oferta->student(Auth::user()->id) && $oferta->student(Auth::user()->id)->status == 2)
		        		<h4 class="text-center">@lang('project.y_w_r') </h4>
		        	@endif
		        @endif
			</div>
		</div>
	</div>
@endsection