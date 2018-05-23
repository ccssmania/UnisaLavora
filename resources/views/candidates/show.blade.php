<div class="col-md-4 ">
	<div class="box box-solid box-{{$user->active == 0 ? 'danger' : 'primary'}}" style="width: 25rem; min-height: 450px; max-height: 450px;">
		<div class="box-header"> {{$user->user->name}} </div>
		<div class="text-center">
			
			<img class="card-img-top " style="margin-top: 15px; " src="{{url('/images/small/'.$user->id.'.jpg')}}" onerror="this.src='{{url("/images/small/perfil.png")}}'" alt="Card image cap">
		</div>
		<div class="box-body">
			<h4 class="box-title text-center">@if($user->roll == env("COMPANY"))<a href=" {{url('/oferts/'.$user->id)}} ">{{$user->user->name}}</a>@else {{$user->user->name}}@endif</h4>
			<p class="box-text">{{$user->user->about ? $user->user->about : ''}}</p>
		</div>
		@if($user->roll == env("STUDENT"))
			<p class="text-center">@lang("project.skills") </p>
			<ul class="list-group list-group-flush">
				@if($user->user->experience)
					@foreach($user->user->experience()->limit(3)->get() as $skill)
						<li class="list-group-item"><div class="col-md-6 text-right">{{$skill->skill_name}}</div><div class="col-md-6">@if(file_exists(storage_path('app/exp/'.$skill->skill_name.'_'.$user->id.'.'.$skill->file_ext)))
							                    	<a target="_blank" href="{{url('/exp/'.$skill->skill_name.'_'.$user->id.'.'.$skill->file_ext)}}">{{$skill->skill_name}}</a>
							                    @endif </div></li>
					@endforeach

				@endif
			</ul>
			<div class="box-body text-center">
				@if(file_exists(storage_path('app/cvs/'.$user->id.'.pdf')))
		        	<a target="_blank" href="{{url('/cvs/'.$user->id.'.pdf')}}">CV</a>
		        @endif
			</div>
		@elseif($user->roll == env("COMPANY"))
			<p class="text-center">@lang("project.oferts") </p>
			<ul class="list-group list-group-flush">
				@foreach($user->user->ofertas()->limit(3)->get() as $oferta)
					<li class="list-group-item"><a href="{{url('/ofert/'.$oferta->id)}}">{{$oferta->title}}</a></li>
				@endforeach
				<li class="list-group-item"><a href=" {{url('/oferts/'.$user->id)}} ">@lang('project.see_more')</a></li>
			</ul>
		@endif
		
	</div>
</div>
