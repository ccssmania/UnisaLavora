<div class="col-md-4 ">
	<div class="box box-solid box-primary" style="width: 25rem; min-height: 450px; max-height: 450px;">
		<div class="box-header"> {{$user->user->name}} </div>
		<div class="text-center">
			
			<img class="card-img-top " style="margin-top: 15px; " src="{{url('/images/small/'.$user->id.'.jpg')}}" onerror="this.src='{{url("/images/small/perfil.png")}}'" alt="Card image cap">
		</div>
		<div class="box-body">
			<h4 class="box-title text-center">{{$user->user->name}}</h4>
			<p class="box-text">{{$user->user->about ? $user->user->about : ''}}</p>
		</div>
		<p class="text-center">@lang("project.skills") </p>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">ID {{$user->id}}</li>
			<li class="list-group-item">Dapibus ac facilisis in</li>
			<li class="list-group-item">Vestibulum at eros</li>
		</ul>
		<div class="box-body">
			@if(file_exists(storage_path('app/cvs/'.$user->id.'.pdf')))
	        	<a target="_blank" href="{{url('/cvs/'.$user->id.'.pdf')}}">CV</a>
	        @endif
			<a href="#" class="box-link">Another link</a>
		</div>
	</div>
</div>
