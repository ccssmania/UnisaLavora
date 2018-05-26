@extends('layouts.app')
@section('content')
<div class=" big-margin-top">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-info">
                <div class="panel-heading">{{$student->name}} </div>

                <div class="panel-body">
                    
					<div class="col-md-12 col-md-offset-4">
						<img class="card-img-top " style="margin-top: 15px; " src="{{url('/images/medium/'.$student->user->id.'.jpg')}}" onerror="this.src='{{url("/images/small/perfil.png")}}'" alt="Card image cap">
					</div>
								
					<div style="margin-top: 30px;">
						
						<div class="col-sm-9">
							<h3 class="break-word"><strong>@lang('project.about_me')</strong></h3>
							<p class="break-word">{!!$student->about!!}</p>
							
						</div>
						<div class="col-sm-3">
							<h3>
								<strong>@lang("project.skills") </strong>
							</h3>
							<table class="table-bordered">
								@foreach($student->experience as $skill)
								<tr>
									
									<td>
										{{$skill->skill_name}}
										@if(file_exists(storage_path('app/exp/'.$skill->skill_name.'_'.$student->user->id.'.'.$skill->file_ext)))
				                    	<td>	
				                    		<a target="_blank" href="{{url('/exp/'.$skill->skill_name.'_'.$student->user->id.'.'.$skill->file_ext)}}">{{$skill->skill_name}}</a>
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