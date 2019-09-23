@extends('layouts.app',['headerName' => 'Agent Registration'])
@section('content')
<div class=" tile">
	<form method="post" id="releaseFrm" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="row form-group">
			<div class="col-md-3">
				<label>Agent ID</label>
				<input type="" name="" class="form-control" value="{{ (new \App\Helpers\Helper)->test() }}">
			</div>
			<div class="col-md-3">
				<label>Agent Name</label>
				<input type="" name="" class="form-control" value="{{ test() }}">
			</div>
			<div class="col-md-3">
				<label>LOB</label>
				<select class="form-control">
					<option></option>
				</select>
			</div>
			<div class="col-md-3">
				<label>Vendor Name</label>
				<select class="form-control">
					<option></option>
				</select>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-3">
				<label>Location</label>
				<select class="form-control">
					<option></option>
				</select>
			</div>
			<div class="col-md-3">
				<label>Campaign</label>
				<select class="form-control">
					<option></option>
				</select>
			</div>
			<div class="col-md-3">
				<label>Agent DOJ</label>
				<input type="" name="" class="form-control">
			</div>
			<div class="col-md-3">
				<label>Supervisor</label>
				<select class="form-control">
					<option></option>
				</select>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-3">
				<label>Supervisor ID</label>
				<input type="" name="" class="form-control" readonly>
			</div>
			<div class="col-md-3">
				<label>Manager</label>
				<select class="form-control">
					<option></option>
				</select>
			</div>
			<div class="col-md-3">
				<label>Manager ID</label>
				<input type="" name="" class="form-control" readonly="">
			</div>
			<div class="col-md-3">
				<label>Organisation</label>
				<input type="" name="" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-3">
				<label>Employee ID</label>
				<input type="" name="" class="form-control">
			</div>
			<div class="col-md-3">
				<label>Designation</label>
				<input type="" name="" class="form-control">
			</div>
			<div class="col-md-3">
				<label>Ayava ID</label>
				<input type="" name="" class="form-control">
			</div>
			<div class="col-md-3">
				<label>Batch No</label>
				<input type="" name="" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-3">
				<label>Production</label>
				<input type="" name="" class="form-control">
			</div>
			<div class="col-md-3">
				<label>Training Date</label>
				<input type="" name="" class="form-control">
			</div>
			<div class="col-md-3">
				<label>OJT Date</label>
				<input type="" name="" class="form-control">
			</div>
			<div class="col-md-3">
				<label>Production Date</label>
				<input type="" name="" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-3">
				<label>Skill Set</label>
				<input type="" name="" class="form-control">
			</div>
			<div class="col-md-3">
				<label>Certificate Status</label>
				<input type="" name="" class="form-control">
			</div>
			<div class="col-md-3">
				<label>Comments</label>
				<input type="" name="" class="form-control">
			</div>
			<div class="col-md-3">
				<label>Status</label>
				<select class="form-control">
					<option></option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<button class="btn btn-primary">Submit</button>
			</div>
		</div>
	</form>
</div>
@endsection
