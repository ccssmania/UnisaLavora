<input type="button" class="btn btn-{{$oferta->student(Auth::user()->id) ? 'danger' : 'info'}}" 
	value="{{$oferta->student(Auth::user()->id) ? trans('project.anular') : trans('project.apply')}}"
	onclick="apply($(this),'{{$url}}','{{$method}}')" name="">