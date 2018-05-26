{!! Form::open(['url' => $url, 'method' => $method, 'class' => 'inline-block accept']) !!}
	<div class="col-md-6 " id="birth">
        <input class="datepicker form-control valid" data-val="true" data-date-format="yyyy-mm-dd"  name="date"
         readonly="readonly" type="text"  required>

        @if ($errors->has('birthday'))
            <span class="help-block">
                <strong>{{ $errors->first('birthday') }}</strong>
            </span>
        @endif
    </div>
 	<input type="submit" class="btn btn-info " style="margin: 0px;" value="{{trans('project.accept')}}">
{!! Form::close() !!}