@extends("layouts.app")
@section("content")
<div class="container little-margin-top">
	<h1>Contacts</h1>
	        <table class="table">
	            <tr>
	                <th height="200" width="200">
	                    <img class="img-circle img-responsive img-center"  src="{{url('/images/'.$user->id.'.jpg')}}" onerror="this.src='{{url("/images/perfil.png")}}'">
	                </th>
	                <th>
	                	<div class="col-md-6">	
		                    <h3>{{$user->user->name}}</h3>
		                    <p><em>{{$user->user->id}}</em></p>
		                    <p><em>{{$user->user->address}}</em></p>
		                    <p>{{$user->email}}</p>
		                    @if($user->roll == env("STUDENT"))
		                    	@if(file_exists(storage_path('app/cvs/'.$user->id.'.pdf')))
		                    		<a target="_blank" href="{{url('/cvs/'.$user->id.'.pdf')}}">CV</a>
		                    	@else
		                    		<div class="has-error">
		                    			<span class="help-block">
	                                        <strong>CV : does not found</strong>
	                                    </span>
		                    		</div>
		                    	@endif
		                    @endif
	                	</div>
	                	<div class="col-md-6 text-right">
	                		<a href="{{url('/perfil/edit/'.$user->id)}}"><i class="fa fa-edit"></i></a>
	                	</div>
	                </th>
	            </tr>
	       
	            <tr><th></th><th></th></tr>
	        </table>

</div>
@endsection