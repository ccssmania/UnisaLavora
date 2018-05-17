@extends('layouts.app')
@section('content')
<div class="container big-margin-top">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-info">
                <div class="panel-heading">Notification</div>

                <div class="panel-body">
                    
					<h1 class="break-word">{{$notification->data['name']}}</h1>
								
					<div style="margin-top: 30px;">
						<div class="col-sm-6">
							
							<img src="{{url("/images/perfil.png")}}" class="-avatar">
							
						</div>
						<div class="col-sm-6">
							<p>
								<strong>Descripcción</strong>
							</p>
							<table>
								<td>
									{!!$notification->data['description']!!}
								</td>
							</table>
								
							
							<br>
							<p>
							</p>
						</div>
							
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection