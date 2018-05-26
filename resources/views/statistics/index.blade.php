@extends('layouts.app')
@section('content')
	<div class="">
		<div class="col-md-12">
			<form action="{{url('/statistics')}}" method="GET" class="form-horizontal">
				<div class="form-group little-margin-bot">
					<label class="control-label col-md-3">@lang('project.filters') </label>
					<div class="col-md-3">
						<input class="datepicker_year form-control valid" data-val="true" placeholder="year" data-date-format="yyyy" 
							 name="year" type="text" value="{{$request->year ? $request->year : ''}}">
					</div>
					<div class="col-md-3">
						<input class="datepicker_month form-control valid" data-val="true" placeholder="month" data-date-format="mm" 
							 name="month" type="text" value="{{$request->month ? $request->month : ''}}">
					</div>
					<div class="col-md-3">
						<input class="datepicker_day form-control valid" data-val="true"  placeholder="day" data-date-format="mm" 
							 name="day" type="text" value="{{$request->day ? $request->day : ''}}">
					</div>

					<label class="control-label col-md-3">
						<input type="submit" class="btn btn-success" name="">
					</label>
				</div>
			</form>
		</div>
		<div class="col-md-12">
			
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">@lang('project.users')</div>
					<div class="panel-body">
						<div id="grafic_users">
							<?= \Lava::render('PieChart', 'Users', 'grafic_users') ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">@lang('project.oferts')</div>
					<div class="panel-body">
						<div id="grafic_companies">
							<?= \Lava::render('ColumnChart', \Lang::get('project.oferts'), 'grafic_companies') ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">@lang('project.interviews')</div>
					<div class="panel-body">
						<div id="grafic_applies">
							<?= \Lava::render('ColumnChart', \Lang::get('project.interview_request'), 'grafic_applies') ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">@lang('project.interviews_accepted')</div>
					<div class="panel-body">
						<div id="grafic_applies_a">
							<?= \Lava::render('ColumnChart', \Lang::get('project.interviews_accepted'), 'grafic_applies_a') ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">@lang('project.interviews_rejected')</div>
					<div class="panel-body">
						<div id="grafic_rejected_a">
							<?= \Lava::render('ColumnChart', \Lang::get('project.interviews_rejected'), 'grafic_rejected_a') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection