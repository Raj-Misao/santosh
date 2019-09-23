@extends('layouts.app',['headerName' => 'Error 401'])
@section('content')
      <div class="page-error tile">
        <h1><i class="fa fa-exclamation-circle"></i>Error 401</h1>
        <h1> You Are Unauthorized To Access This Page.</h1>
        <p>
            <a class="btn btn-primary" href="/">Go To Home Page</a>
            <a class="btn btn-primary" href="javascript:window.history.back();">Go Back</a>
        </p>
      </div>

@endsection
