@extends('layouts.app',['headerName' => $headerName])
@section('content')
<div class=" tile">
	<div class="row">
		<div class="col-md-2  form-group">
			<label>From</label>
			<input name="from" id="from" value="{{ date('01-m-Y') }}" class="date-picker form-control " required="required" type="text">
		</div>
		<div class="col-md-2  form-group">
			<label>To</label>
			<input name="to" id="to" value="{{ date('d-m-Y') }}" class="date-picker form-control" required="required" type="text">
		</div>
		<div class="col-md-2  form-group">
			<label>Evaluation Type</label>
			<select id="evaltype" class="form-control">
				<option value="all">All</option>
				<option value="call">Call</option>
				<option value="email">Email</option>
			</select>
		</div>
		<div class="col-md-2  form-group">
			<label>Form Type</label>
			<select id="form_type" class="form-control">
				<option value="all">All</option>
			</select>
		</div>
		<div class="col-md-4  form-group">
			<label>Lob</label>
			<select name="lob" id="lob" class="form-control">
				<option>Select Lob</option>
				@foreach($lob as $l)
				<option value="{{$l->lob}}">{{$l->lob}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 form-group">
			<label>Queue Name</label>
			<select name="que_name" id="que_name" class="form-control searchSelect" multiple="multiple">
				<option value="">Select</option>
			</select>
		</div>
		<div class="col-md-2 form-group">
			<label>Campaign</label>
			<select name="campaign" id="campaign" class="form-control" style="width:100%">
				<option value="">Select</option>
			</select>
		</div>
		<div class="col-md-2 form-group">
			<label>Agent</label>
			<select name="agent_name" id="agent_name" class="form-control">
				<option value="">Select</option>
			</select>
		</div>
		<div class="col-md-2 form-group">
			<label>Vendor</label>
			<select name="vendor" id="vendor" class="form-control" style="width:100%">
				<option value="">Select</option>
			</select>
		</div>
		<div class="col-md-2 form-group">
			<label>Location</label>
			<select name="location" id="location" class="form-control" style="width:100%">
				<option value="">Select</option>
			</select>
		</div>
		<div class="col-md-2 form-group">
			<button class="btn btn-primary" style="margin-top:26px;width: 100%">Submit</button>
		</div>
	</div>
</div>
<div class=" tile"></div>
@endsection