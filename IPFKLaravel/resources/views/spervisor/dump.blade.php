@extends('layouts.app',['headerName' => $headerName])
@section('content')
<div class=" tile">
	<form method="post" id="releaseFrm" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="row form-group">
			<div class="col-md-3">
				<label>Type Of Evaluation</label>
				<select class="form-control" name="eval_type" id="eval_type">
					<option value="">Select</option>
					<option value="Call">Call</option>
					<option value="Mail">Mail</option>
				</select>
			</div>
			<div class="col-md-3">
				<label>Type Of Dump</label>
				<select class="form-control" name="dump_type" id="dump_type">
					<option value="">Select</option>
					<option value="Assigned">Assigned</option>
					<option value="Unassigned">Unassigned</option>
					<option value="Completed">Completed</option>				
				</select>
			</div>
			<!-- Display Block When Type Of Dump Is Completed -->
			<div class="col-md-3" id="add_form" style="display: none;">
				<label>Select Form</label>
				<select name="form_name" id="form_name" class="form-control">
					<option value="">Select</option>
				</select>
			</div>
			<!-- End Display Block When Type Of Dump Is Completed -->
			<div class="col-md-3">
				<label>Select Date Range/Roster Date</label>
				<div class="row">
					<div class="col-md-6">
						<input type="radio" id="date_type" name="date_type" value="daterange"> Date Range				
					</div>
					<div class="col-md-6">
						<input type="radio" id="date_type" name="date_type" value="Roster Date"> Roster Date
					</div>
				</div>
			</div>
			<!-- Display When Date Rang Is Checked -->
			<div class="col-lg-3" id="daterange" style="display:none;">
				<div class="row">
					<div class="col-lg-6">
						<label>From </label><br>
						<input name="from" id="from" value="" class="date-picker form-control " type="text">
					</div>
					<div class="col-lg-6">
						<label>To </label><br>
						<input name="to" id="to" value="" class="date-picker form-control"  type="text">
					</div>
				</div>
			</div>
			<!-- End Display When Date Rang Is Checked -->
			<!-- Display When Roster Date Is Checked -->
			<div class="col-lg-3" id="rosterdate" style="display: none;">
				<label>Select Roster Date</label><br>
				<input name="rdate" id="rdate" value="" class="date-picker form-control "  type="text" autocomplete="off">
			</div>
			<!-- End Display When Roster Date Is Checked -->
			<div class="col-md-3">
				<label>Lob</label>
				<select class="form-control" name="lob" id="lob">
					<option></option>
				</select>
			</div>
			<!-- </div> -->
			<!-- <div class="row form-group"> -->
			<div class="col-md-3">
				<label>Campaign</label>
				<select class="form-control" name="campaign" id="campaign">
					<option></option>
				</select>
			</div>
			<div class="col-md-3">
				<label>Vendor</label>
				<select class="form-control" name="vendor" id="vendor">
					<option></option>
				</select>
			</div>
			<div class="col-md-3">
				<label>Location</label>
				<select class="form-control" name="location" id="location">
					<option></option>
				</select>
			</div>
			<div class="col-md-3">
				<label>Agent ID</label>
				<select class="form-control" name="agent_id" id="agent_id">
					<option></option>
				</select>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12 from-group text-center">
				<button class="btn btn-primary text-center">Submit</button>
			</div>
		</div>
	</form>
</div>
@endsection