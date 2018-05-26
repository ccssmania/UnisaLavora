@extends('layouts.app')
@section('content')
<div class=" big-margin-top">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-info">
                <div class="panel-heading">{{$company->name}} </div>

                <div class="panel-body">
                    
					<div class="col-md-12 col-md-offset-4">
						<img class="card-img-top " style="margin-top: 15px; " src="{{url('/images/medium/'.$company->user->id.'.jpg')}}" onerror="this.src='{{url("/images/small/perfil.png")}}'" alt="Card image cap">
					</div>
								
					<div style="margin-top: 30px;">
						
						<div class="col-sm-9">
							<h3 class="break-word"><strong>@lang('project.about_me')</strong></h3>
							<p class="break-word">{!!$company->about!!}</p>
							
						</div>
						<div class="col-sm-3">
							<h3>
								<strong>@lang("project.oferts") </strong>
							</h3>
							<table class="table-bordered">
								@foreach($company->ofertas as $oferta)
								<tr>
									
									<td>
										<a href="{{url('/ofert/'.$oferta->id)}}">{{$oferta->title}}</a>
										@if(file_exists(storage_path('app/ofr/'.$company->id.'.pdf')))
					                    	<td>	
					                    		<a target="_blank" href="{{url('/ofr/'.$company->id.'.pdf')}}">file</a>
					                    	</td>
				                   		@endif
									</td>
								</tr>
								@endforeach
							</table>
								
							
							<br>
							<p>
							</p>
						</div>
							
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection