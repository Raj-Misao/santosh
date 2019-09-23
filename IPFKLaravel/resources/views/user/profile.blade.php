@extends('layouts.app',['headerName' => 'Profile'])
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			@if (\Session::has('success'))
				<div class="alert alert-dismissible alert-success text-center">
            		<button class="close" type="button" data-dismiss="alert">×</button>
            		<strong>{!! \Session::get('success') !!}</strong>
        		</div>	
			@endif
			@if (\Session::has('error'))
				<div class="alert alert-dismissible alert-danger text-center">
            		<button class="close" type="button" data-dismiss="alert">×</button>
            		<strong>{!! \Session::get('error') !!}</strong>
        		</div>	
			@endif
			<div class="row">
				<div class="col-md-3">
					<div class="col-md-12">
						<div class="profile">
							<div class="info"><img class="user-img" id="user_img" src="images/{{Auth::user()->profile_img}}">
								<span class="text-center" style="text-transform:capitalize">
  									<h4 id="uname">{{ Auth::user()->name }}</h4>
  									<p>{{Auth::user()->user_type}}</p>									
								</span>
							</div>
							<div class="cover-image"></div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<form method="post" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
						{{ csrf_field() }}	
						<div class="form-group">
            				<label for="exampleInputEmail1">Name</label>
            				<input class="form-control" id="name" type="text" name="name" value="{{ Auth::user()->name }}">
							@if ($errors->has('old_password'))
        						<span class="help-block">
            						<strong>{{ $errors->first('old_password') }}</strong>
        						</span>
							@endif
        				</div>
        				<div class="form-group">
            				<label for="exampleInputEmail1">Email</label>
            				<input class="form-control" id="email" type="email" name="email" value="{{ Auth::user()->mailid != 'NULL'? Auth::user()->mailid: '' }}">			
        				</div>
        				<div class="form-group">
							<label>Profile Pic</label>
        					<input class="form-control" id="pic" type="file" name="pic" accept="image/gif, image/jpeg, image/png" onchange="readURL(this);">
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