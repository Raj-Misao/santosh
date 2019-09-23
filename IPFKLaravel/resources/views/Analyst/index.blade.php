@extends('layouts.app',['headerName' => $headerName])
@section('content')
<div class="container-fluid">  
    <!-- Control the column width, and how they should appear on different devices -->
    <div class="row">
        <div class="col-md-3">
            <span>Evaluated <strong>Calls</strong>:<span class="text-highlight">{{ $evaluated_call}}</span></span>
        </div>
        <div class="col-md-3">
            <span >Not Evaluated <strong>Calls</strong>:<span class="text-highlight">{{ $not_evaluated_call}}</span></span>
        </div>
        <div class="col-md-3">
            <span>Evaluated <strong>Mails</strong>:<span class="text-highlight">{{ $evaluated_mail}}</span></span>
        </div>
        <div class="col-md-3">
            <span >Not Evaluated <strong>Mails</strong>:<span class="text-highlight">{{ $not_evaluated_mail}}</span></span>            
        </div>
    </div><hr>
    <form method="post" id="filterFrm">
        <input type="hidden" id="_token" value="{{ csrf_token() }}">
        <div class="row">        
            <div class="col-md-3">
                <div class="form-group">
                    <label>Eval or Not Eval</label>
                    <select class="form-control" id="eval" name="eval">
                        <option value="">Select</option>
                        <option value="0">Not Evaluated</option>
                        <option value="1">Evaluated</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <label>Interaction Type</label>
                <select class="form-control" id="interaction" name="interaction">
                    <option value="">Select</option>
                    <option value="Calls">Calls</option>
                    <option value="Emails">Emails</option>
                </select>
            </div>
            <div class="col-md-3 hidden" id="call">
                <label>Call Type</label>
                <select class="form-control" id="call_type" name="call_type">
                    <option value="">Select</option>
                    <option value="Inbound">Inbound</option>
                    <option value="Outbound">Outbound</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-success" style="margin-top: 12%">Submit</button>
            </div>       
        </div>
    </form>
    <div id="searchData"></div>
</div>
@endsection
