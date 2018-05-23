<form action="{{$url}}" method="POST" class="col-md-5 text-left">
	{{ csrf_field() }}
 	<input type="submit" class="btn btn-danger no-margin" value="{{trans('project.ignore')}}">
</form>
