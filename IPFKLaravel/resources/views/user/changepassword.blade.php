@extends('layouts.app',['headerName' => 'change password'])
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			@if (\Session::has('message'))	
				<div class="alert alert-dismissible alert-danger text-center">
            		<button class="close" type="button" data-dismiss="alert">×</button>
            		<strong>{!! \Session::get('message') !!}</strong>
        		</div>	
			@endif
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<form method="post" action="{{ route('changePassword') }}">
						{{ csrf_field() }}	
						<div class="form-group">
            				<label for="exampleInputEmail1">Enter old password</label>
            				<input class="form-control" id="exampleInputEmail1" type="password" name="old_password" placeholder="Enter Old Password">
							@if ($errors->has('old_password'))
        						<span class="help-block">
            						<strong>{{ $errors->first('old_password') }}</strong>
        						</span>
							@endif
        				</div>
        				<div class="form-group">
            				<label for="exampleInputEmail1">Enter New Password</label>
            				<input class="form-control" id="new_password" type="password" name="password" placeholder="Enter New Password">
							@if ($errors->has('password'))
		        				<span class="help-block">
		            				<strong>{{ $errors->first('password') }}</strong>
		        				</span>
		    				@endif			
        				</div>
        				<div class="form-group">
							<label>Confrim Password</label>
        					<input class="form-control" id="confrim_password" type="text" name="password_confirmation" placeholder="Enter Confrim Password">
							@if ($errors->has('password_confirmation'))
		        				<span class="help-block">
		            				<strong>{{ $errors->first('password_confirmation') }}</strong>
		        				</span>
		    				@endif
						</div>
						<div class="tile-footer">
            				<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
        				</div>
					</form>					
				</div>
			</div>			
		</div>	
	</div>
</div>
@endsection