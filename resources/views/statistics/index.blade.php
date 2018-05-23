@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-md-10">
			
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
		</div>
	</div>
@endsection