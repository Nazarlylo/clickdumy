@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="users">
                <span>Name:{{ $user->name }}</span>
                <span>Groupe:@if($user->group ==1)Clients @else Verdure @endif</span>
					<span>Email:{{ $user->email }}</span>
				</div>
				<div class="panel panel-default">
					{{--<div class="panel-heading">Register</div>--}}
					<div class="panel-body">
						<form class="form-horizontal" role="form" method="POST" action="{{ url('/update/'.$user->id) }}">
							{!! csrf_field() !!}

							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								<label class="col-md-4 control-label">Name</label>

								<div class="col-md-6">
									<input type="text" class="form-control" name="name" value="{{ $user->name }}">

									@if ($errors->has('name'))
										<span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							{{--<div class="form-group">--}}
								{{--<label class="col-md-4 control-label">Group</label>--}}

								{{--<div class="col-md-6">--}}
									{{--<select name="group">--}}
										{{--<option @if($user->group ==1) selected @endif value="1">Clients</option>--}}
										{{--<option @if($user->group ==2) selected @endif value="2">Verdure</option>--}}
									{{--</select>--}}
								{{--</div>--}}
							{{--</div>--}}
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label class="col-md-4 control-label">E-Mail Address</label>

								<div class="col-md-6">
									<input type="email" class="form-control" name="email" value="{{ $user->email }}">

									@if ($errors->has('email'))
										<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label class="col-md-4 control-label">New Password</label>

								<div class="col-md-6">
									<input type="password" class="form-control" name="password">
									@if ($errors->has('password'))
										<span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										<i class="fa fa-btn fa-user"></i>Update profile
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
