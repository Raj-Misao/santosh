@extends('layouts.app',['headerName' => 'remove Unique ids'])
@section('content')
<div class=" tile">
	<form method="post" id="releaseFrm" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="row">
			<div class="col-md-3">
				<label>Select Data Type <small>(only csv allowed)</small></label>
				<select name="data_type" id="data_type" class="form-control ">
					@foreach($frm as $val)
						@if(!empty($val->form_name))
							<option {{$val->form_tbl}}>{{$val->form_name}}</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="col-md-4"></div>
			<div class="col-md-5" style="text-align: center;">
				<span>Please download sample CSV for new update</span>
				<a href="excel/remove_unique_id.csv" class="excel" download><p>Download Sample CSV</p>
					<img src="../images/excel.png" class="text-center">
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<input type="file" name="a_file" id="a_file" class="btn btn-primary" accept=".csv">
			</div>
			<div class="col-md-3">
				<button class="btn btn-primary">Upload</button>
			</div>
		</div>
	</form>
</div>
@endsection