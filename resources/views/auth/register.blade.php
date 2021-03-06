@extends('layouts.need_active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">@lang("project.name")</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">@lang("project.email")</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            

                        <div class="form-group">
                            <label class="col-md-4 control-label">@lang("project.phone_number")</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" value="{{ old('phone') }}" name="phone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">@lang("project.address")</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ old('address') }}" name="address">
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">@lang("project.password")</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-md-4 control-label">@lang("project.repit_password")</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-md-4 control-label">@lang("project.user_type")</label>

                            <div class="col-md-6">
                                <select class="form-control" name="roll" required id="select" onchange="student_company();">
                                    <option value="" disabled {{old('roll') ? '' : 'selected'}}>Select One</option>
                                    @php
                                        $oldSelected = old('roll') ? old('roll') : '';
                                        for($i = 1; $i<=2; $i++){
                                            $selected = $oldSelected == $i ? $i : '';
                                        }
                                    @endphp
                                    <option value="1" {{$selected == 1 ? 'selected' : ''}} >@lang("project.company")</option>
                                    <option value="2" {{$selected == 2 ? 'selected' : ''}}>@lang("project.student")</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('id') || $errors->has('dni') || $errors->has('birthday') ? ' has-error' : '' }}" id="users_rolls">

                            <label  class="col-md-4 control-label" id="student_label" style="display: {{ ($errors->has('id') || $errors->has('birthday'))  ? '' : 'none' }};">@lang("project.student") ID</label>
                            <div class="col-md-6 " id="student_div" style="display:{{ ($errors->has('id') || $errors->has('birthday')) ? '' : 'none' }};"> 
                                <input type="text" class="form-control" id="id" name="id" required>
                                @if ($errors->has('id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>




                            <label  class="col-md-4 control-label" id="birth_label" style="display: {{ ($errors->has('id') || $errors->has('birthday')) ? '' : 'none' }};">@lang("project.birthday")</label>

                            <div class="col-md-6 " id="birth" style="display:{{ ($errors->has('id') || $errors->has('birthday')) ? '' : 'none' }};">
                                <input class="datepicker form-control valid" data-val="true" data-date-format="yyyy-mm-dd"  name="birthday" readonly="readonly" type="text" value="">

                                @if ($errors->has('birthday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                            



                            <label  class="col-md-4 control-label" id="company_label" style="display: {{ ($errors->has('id') || $errors->has('dni'))  && old('dni') ? '' : 'none' }};">@lang("project.company") DNI</label>
                            <div class="col-md-6 " id="company_div" style="display: {{ ($errors->has('id') || $errors->has('dni'))  && old('dni')  ? '' : 'none' }};">
                                <input type="text" class="form-control" id="dni" name="dni" required>
                                @if ($errors->has('dni'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang("project.register")
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
