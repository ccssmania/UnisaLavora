<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 big-margin-bot">
            <div class="panel panel-default big-margin-bot">
                <div class="panel-heading">Perfil</div>
				<form class="form-horizontal" method="{{$method}}" action="{{$url}}" enctype="multipart/form-data">
					{{ csrf_field() }}
					
						<div class="form-group big-margin-top">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" name="name" placeholder="{{$user->user->name ? $user->user->name : 'Name'}}" class="form-control">
							</div>
						</div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

				            <div class="col-md-6">
				                <input id="email" type="email" class="form-control" name="email" placeholder="{{$user->email? $user->email : 'E-mail'}}">

				                @if ($errors->has('email'))
				                    <span class="help-block">
				                        <strong>{{ $errors->first('email') }}</strong>
				                    </span>
				                @endif
				            </div>
				        </div>
						<div class="form-group">
							<label class="col-md-4 control-label">Phone</label>
							<div class="col-md-6">
								<input type="number" name="phone" placeholder="{{$user->user->phone ? $user->user->phone : 'Phone'}}" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Address</label>
							<div class="col-md-6">
								<input type="text" name="address" placeholder="{{$user->user->address ? $user->user->address : 'Address'}}" class="form-control">
							</div>
						</div>
						<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Picture</label>
							<div class="col-md-6">
								<table class="table">
						            <tr>
						                <th height="70" width="200">
						                    <img class="img-circle img-responsive img-center"  src="{{url('/images/'.$user->id.'.jpg')}}" onerror="this.src='{{url("/images/perfil.png")}}'">
						                </th>
						                <th>
							                <h3>Change</h3>
							                <input type="file" name="file">
							                @if ($errors->has('file'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('file') }}</strong>
			                                    </span>
			                                @endif
						                </th>
						            </tr>
						       
						            <tr><th></th><th></th></tr>
						        </table>
							</div>
						</div>
						@if($user->roll == env("STUDENT"))
							<div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
								<label class="col-md-4 control-label">ID</label>
								<div class="col-md-6">
									<input type="text" name="id" placeholder="{{$user->user->id ? $user->user->id : 'ID'}}" class="form-control">
									@if ($errors->has('id'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('id') }}</strong>
	                                    </span>
	                                @endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('cv') ? ' has-error' : '' }}">
								<label class="col-md-4 control-label">CV</label>
								<div class="col-md-6">
									<table class="table">
							            <tr>
							                <th >
							                	@if(file_exists(storage_path('app/cvs/'.$user->id.'.pdf')))
							                    	<a target="_blank" href="{{url('/cvs/'.$user->id.'.pdf')}}">CV</a>
							                    @else
							                    	CV
							                    @endif
							                  	
							                </th>
							                <th>
								                <h3>Change</h3>
								                <p class="text-danger">Only PDF</p>
								                <input type="file" name="cv">
								                @if ($errors->has('cv'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('cv') }}</strong>
				                                    </span>
				                                @endif
							                </th>
							            </tr>
							       
							            <tr><th></th><th></th></tr>
							        </table>
								</div>
							</div>
						@endif
						@if($user->roll == env("COMPANY"))
							<div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
								<label class="col-md-4 control-label">DNI</label>
								<div class="col-md-6">
									<input type="text" name="id" placeholder="{{$user->user->id ? $user->user->id : 'DNI'}}" class="form-control">

									@if ($errors->has('id'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('id') }}</strong>
	                                    </span>
	                                @endif
								</div>
							</div>
						@endif
						<div class="form-group">
							<label class="col-md-4 control-label">Change Password</label>
							<div class="col-md-6">
								<a class="btn btn-link" href="{{ route('password.request') }}">
						            Forgot Your Password?
						        </a>
							</div>
						</div>
						<div class="form-group">
							
							<div class="col-md-6 col-md-offset-4 text-right big-margin-bot">
								<input type="submit" value="Send" class="btn btn-success">
							</div>
						</div>
						
					
				</form>
            </div>
        </div>
    </div>
</div>