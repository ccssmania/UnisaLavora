<div class="col-md-4 ">
	<div class="box box-solid box-{{$oferta->status == 0 ? 'danger' : 'primary'}}" style="width: 30rem; min-height: 450px; max-height: 450px; ">
		<div class="box-header"> {{$oferta->title}}
			
		 </div>
		<div class="text-center  border-bot">
			<h3 class="text-center">@lang("project.description") </h3>	
		</div>
		
		<div class="tex-center" style="max-height: 230px;min-height: 230px; overflow-y: scroll;">
			<div class="col-md-12">
				<h5 class="text-responsive text-center" >{!!$oferta->description!!}</h5>
			</div>
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
	        	@if(!$oferta->student_status(Auth::user()->id) || $oferta->student_status(Auth::user()->id) || $oferta->student(Auth::user()->id))
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
