<form method="post" action="{{ route('uploadcsv') }}" enctype="multipart/form-data">
	{{ csrf_field() }}	
	<div class="form-group">
		<label for="exampleInputEmail1">Upload Excel</label>
		<input class="form-control" type="file" name="excel_upload">
		@if ($errors->has('csv'))
			<span class="help-block">
				<strong>{{ $errors->first('csv') }}</strong>
			</span>
		@endif
	</div>
	<div class="tile-footer">
		<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
	</div>
</form>