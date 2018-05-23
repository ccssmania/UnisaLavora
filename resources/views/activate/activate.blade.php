<form action="{{$url}}" method="POST" class="col-md-5 text-right">
	{{ csrf_field() }}
 	<input type="submit" class="btn btn-success no-margin" value="{{trans('project.confirm')}}">
</form>
