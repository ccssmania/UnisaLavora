{!! Form::open(['url' => '/interview/'.$oferta->id, 'method' => 'POST', 'class' => 'inline-block']) !!}
 	<input type="submit" class="btn btn-link text-red" style="margin: 0px;" value="{{trans('project.delete')}}">
{!! Form::close() !!}