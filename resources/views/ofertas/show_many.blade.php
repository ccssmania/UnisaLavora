<div class="col-md-4 ">
	<div class="box box-solid box-{{$oferta->status == 0 ? 'danger' : 'primary'}}" style="width: 25rem; min-height: 450px; max-height: 450px; ">
		<div class="box-header"> {{$oferta->title}}
			
		 </div>
		<div class="text-center  border-bot">
			<h3 class="text-center">@lang("project.description") </h3>	
		</div>
		
		<div class="tex-center" style="max-height: 230px; overflow-y: scroll;">
			<h5 class="text-responsive">{!!$oferta->description!!}</h5>
		</div>
		<div class="box-body text-center">
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
	        	@include('candidates.apply', ['url' => $oferta->student(Auth::user()->id) ? "/apply/delete/$oferta->id/".Auth::user()->id : "/apply/add/$oferta->id/".Auth::user()->id, 'method' => 'POST'])
	        @endif
		</div>
	</div>
</div>
