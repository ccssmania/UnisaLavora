<div class="big-margin-top">
    <div class="row">
        <div class="col-md-10 big-margin-bot little-margin-left">
            <div class="panel panel-primary big-margin-bot">
                <div class="panel-heading">@lang('project.ofert') </div>
				<form class="form-horizontal big-margin-top" method="{{$method}}" action="{{$url}}" enctype="multipart/form-data">
					{{ csrf_field() }}
					
						<div class="form-group ">
							<label class="col-md-4 control-label">@lang("project.title") </label>
							<div class="col-md-6">
								<input type="text" name="title"  placeholder="{{$oferta->title ? $oferta->title : trans('project.title')}}" class="form-control" {{$oferta->title ? '' : 'required'}}>
							</div>
						</div>
						<div class="form-group">
				            <label  class="col-md-4 control-label">@lang("project.description") </label>

				            <div class="col-md-6">
				                <textarea class="textarea" name="description">{{$oferta->description ? $oferta->description : ''}} {{old('description') ? old('description') : ''}}</textarea>

				            </div>
				        </div>
						<div class="form-group{{ $errors->has('ofr') ? ' has-error' : '' }}">
								<label class="col-md-4 control-label">@lang("project.od") </label>
								<div class="col-md-6">
									<table class="table">
							            <tr>
							                <th >
							                	@if(file_exists(storage_path('app/ofr/'.$oferta->id.'.pdf')))
							                    	<a target="_blank" href="{{url('/ofr/'.$oferta->id.'.pdf')}}">@lang('project.document')</a>
							                    @else
							                    	@lang('project.document')
							                    @endif
							                  	
							                </th>
							                <th>
								                <h3>Change</h3>
								                <p class="text-danger">@lang("project.only") PDF</p>
								                <input type="file" name="ofr">
								                @if ($errors->has('ofr'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('ofr') }}</strong>
				                                    </span>
				                                @endif
							                </th>
							            </tr>
							       
							            <tr><th></th><th></th></tr>
							        </table>

								</div>
							</div>
						<div class="form-group">
							
							<div class="col-md-6 col-md-offset-4 text-right big-margin-bot">
								<input type="submit" value="{{trans('project.send')}}" class="btn btn-success">
							</div>
						</div>
						
					
				</form>
            </div>
        </div>
    </div>
</div>

