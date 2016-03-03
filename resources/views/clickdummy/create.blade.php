@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Create Click-Dummy</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form"  method="POST" action="{{ url('/click-dummy') }}" enctype="multipart/form-data">
							{!! csrf_field() !!}
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								<label class="col-md-4 control-label">Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name" value="">
									@if ($errors->has('name'))
										<span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							@if (Auth::guest())
							<div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
								<label class="col-md-4 control-label">Username</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="user_name" value="">
									@if ($errors->has('user_name'))
										<span class="help-block">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label class="col-md-4 control-label">E-Mail Address</label>

								<div class="col-md-6">
									<input type="email" class="form-control" name="email" value="">

									@if ($errors->has('email'))
										<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label class="col-md-4 control-label">Password</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password" value="">
									@if ($errors->has('password'))
										<span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							@endif
							<div class="form-group{{ $errors->has('title0') ? ' has-error' : '' }}">
								<label class="col-md-4 control-label">title image1</label>
								<div class="col-md-6">
									<input type="text" name="title0">
									<input type="hidden" name="img_index0" value="1">
									@if ($errors->has('title0'))
										<span class="help-block">
                                        <strong>{{ $errors->first('title0') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Images1</label>
							    <div class="col-md-6">
									<input type="file" name="images[]">
								</div>
								</div>
							<div class="form-group">
								<label class="col-md-4 control-label">approve/disapprove</label>
								<div class="col-md-6">
									<input type="checkbox"  name="disap0" value="1">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">title image2</label>
								<div class="col-md-6">
									<input type="text" name="title1">
									<input type="hidden" name="img_index1" value="2">
								</div>
							</div>
								<div class="form-group ">
								<label class="col-md-4 control-label">Images2</label>
								<div class="col-md-6">
									<input type="file" name="images[]">
								</div>
								</div>
							<div class="form-group">
								<label class="col-md-4 control-label">approve/disapprove</label>
								<div class="col-md-6">
									<input type="checkbox"  name="disap1" value="1">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">title image3</label>
								<div class="col-md-6">
									<input type="text" name="title2">
									<input type="hidden" name="img_index2" value="3">
								</div>
							</div>
									<div class="form-group ">
								<label class="col-md-4 control-label">Images3</label>
								<div class="col-md-6">
									<input type="file" name="images[]">
								</div>
								</div>
							<div class="form-group">
								<label class="col-md-4 control-label">approve/disapprove</label>
								<div class="col-md-6">
									<input type="checkbox"  name="disap2" value="1">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">title image4</label>
								<div class="col-md-6">
									<input type="text" name="title3">
									<input type="hidden" name="img_index3" value="4">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label ">Images4</label>
								<div class="col-md-6">
									<input type="file" name="images[]">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">approve/disapprove</label>
								<div class="col-md-6">
									<input type="checkbox"  name="disap3" value="1">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Protection</label>
								<div class="col-md-6">
									<input type="checkbox" class="form-control" name="protection" value="1">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										<i class="fa fa-btn fa-user"></i>Create
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
