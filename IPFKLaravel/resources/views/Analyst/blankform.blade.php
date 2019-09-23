@extends('layouts.app',['headerName' => $headerName])
@section('content')
<form method="post" action="{{ route('blankFrm') }}">
	{{ csrf_field() }}
	<div class="tile">
		<!-- common form -->
			<div class="row">
				<div class="col-md-2 form-group">
					<label>Unique ID</label>
					<input type="text" name="unique_id" id="unique_id" value="{{uniqid() }}" readonly="readonly" class="form-control"  autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Call ID</label>
					<input type="text" name="call_id" id="call_id"  class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Agent ID</label>
					<select name="agent_id" id="agent_id" class="form-control searchSelect">
						<option>Select Agent Id</option>
						@foreach ($agent as $agentid)
					    	<option value="{{$agentid->agent_id}}">{{ $agentid->agent_id}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-2 form-group">
					<label>Vendor</label>
					<input type="text" name="vendor" id="vendor" readonly="readonly" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Lob</label>
					<input type="text" name="lob" id="lob" readonly="readonly" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Location</label>
					<input type="text" name="location" id="location" readonly="readonly" class="form-control" autocomplete="off">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 form-group">
					<label>Campaign</label>
					<input type="text" name="campaign" id="campaign" readonly="readonly" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Agent Name</label>
					<input type="text" name="agent_name" id="agent_name" readonly="readonly" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Sup Name</label>
					<input type="text" name="sup_name" id="sup_name" readonly="readonly" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Company</label>
					<select name="company" id="company" class="form-control">
						<option value="">Select</option>
			            <option value="FK">FK</option>
			            <option value="MK">MK</option>
					</select>
				</div>
				<div class="col-md-2 form-group">
					<label>Call Date Time</label>
					<input type="text" name="call_date_time" id="call_date_time" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Incident ID</label>
					<input type="text" name="incident_id" id="incident_id" class="form-control" autocomplete="off">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 form-group">
					<label>Queue Name</label>
					<input type="text" name="que_name" id="que_name" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Partner location</label>
					<input type="text" name="part_loc" id="part_loc" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Call TYPE</label>
					<input type="text" name="call_type" id="call_type" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Status during thread entry</label>
					<input type="text" name="status_thread" id="status_thread" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Incident Created At</label>
					<input type="text" name="incident_date_time" id="incident_date_time" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Thread Created At</label>
					<input type="text" name="thread_created_at" id="thread_created_at" class="form-control" autocomplete="off">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 form-group">
					<label>Queue during thread entry</label>
					<input type="text" name="que_thread_entry" id="que_thread_entry" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Seller ID</label>
					<input type="text" name="seller_id" id="seller_id" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Seller Name</label>
					<input type="text" name="seller_name" id="seller_name" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Seller Location</label>
					<input type="text" name="seller_location" id="seller_location" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Language</label>
					<select name="language" id="language" class="form-control">
						<option value="">Select</option>
			            <option value="English">English</option>
			            <option value="Hindi">Hindi</option>
					</select>
				</div>
				<div class="col-md-2 form-group">
					<label>Center Name</label>
					<input type="text" name="centre_name" id="centre_name" class="form-control" autocomplete="off">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 form-group">
					<label>Issue Type</label>
					<input type="text" name="issue_type" id="issue_type" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Current Issue Type</label>
					<input type="text" name="current_issue_type" id="current_issue_type" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Call Duration</label>
					<input type="text" name="call_duration" id="call_duration" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Current Status</label>
					<input type="text" name="current_status" id="current_status" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Partner Location</label>
					<input type="text" name="part_loc" id="part_loc" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Score(%)</label>
					<input type="text" name="total_score" id="total_score" readonly="readonly" class="form-control" autocomplete="off">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 form-group">
					<label>PC Score(%)</label>
					<input type="text" name="pc_score" id="pc_score" readonly="readonly" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Pre-FATAL Score(%)</label>
					<input type="text" name="preAF_score" id="preAF_score" readonly="readonly" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Timer</label>
					<input type="text" name="wrap_time" id="wrap_time" value="00:00:00" readonly="readonly" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-2 form-group">
					<label>Validity</label>
					<select name="validity" id="validity" class="form-control">
						<option value="1">Valid</option>
			           	<option value="0">Invalid</option>
					</select>
				</div>
				<div class="col-md-4" style="text-align: center;margin-top: 1.5%;">
					<audio controls="controls" id="audio_player" style="color:black;">
			            <source src="" type="audio/mpeg">
			        </audio>
				</div>
			</div>
		<!-- End common form -->
		<hr/>

        <div class="accordion" id="accordionExample275">
        	<!-- Compliance -->
  			<div class="card z-depth-0 bordered">
    			<div class="card-header" id="headingOne2">
      				<h5 class="mb-0">
        				<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
          				<i class="fa fa-chevron-right" aria-hidden="true"></i>Compliance
        				</button>
      				</h5>
      				<span style="float: right;margin-top:-2.6%;color:#009688;font-weight: 400">Score: <span id="sc_attr01"></span></span>

    			</div>
    			<div id="collapseOne2" class="collapse" aria-labelledby="headingOne2" data-parent="#accordionExample275">
      				<div class="card-body">
        				<div class="row">
        					<div class="col-md-2 form-group">
        						<label>Opening &nbsp;Greeting</label>        						
        					</div>
        					<div class="col-md-1 form-group"></div>
        					<div class="col-md-2 form-group">
        						<select  name="att01_sel" id="att01_sel" onchange='setScore("att01_score",$(this).find("option:selected").attr("dScore"));preAF("att01_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr01_cat","catscr01","sc_attr01",$(this).find("option:selected").attr("dScore")); getValue("att01_sel");' class="form-control SelOpt" required="required">
                                    <option value="">Select</option>
                                    <option dScore='3'  pAFscr='3' value="YES">YES</option>
                                    <option dScore='0'  pAFscr='0' value="NO">NO</option>
                                    <option dScore='AF' pAFscr='3' value="FATAL">FATAL</option>
                                    <option dScore='AF' pAFscr='3' value="Zero Tolerance">Zero Tolerance</option>
                                    <option dScore='AF' pAFscr='3' value="Red Alert">Red Alert</option>
                                </select>
        					</div>
        					<div class="col-md-2 form-group">
        						<select name="reason01_sel" id="reason01_sel" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Did not open the call within 8 seconds">Did not open the call within 8 seconds</option>
                                    <option value="Not a clear opening">Not a clear opening</option>
                                    <option value="Did not switch to seller's preferred language when seller asks">Did not switch to seller's preferred language when seller asks</option>
                                    <option value="Opening not in English">Opening not in English</option>
                                    <option value="Failed to give opening">Failed to give opening </option>
                                    <option value="Missed on branding">Missed on branding</option>
                                    <option value="Missed on self introduction">Missed on self introduction</option>
                                </select>        						
        					</div>
        					<div class="col-md-3 form-group">
        						<textarea  id="att01_com" name="att01_com"></textarea>
        					</div>
        					<div class="col-md-2 form-group">
        						<input type="text" readonly id="att01_score" name="att01_score" value="" class="center form-control scr catscr01">
        						<input  type="hidden" id="att01_pafscore" value=""  class="center form-control pf_scr">
        					</div>
        				</div>
        				<div class="row">
        					<div class="col-md-2 form-group">
        						Security Checks
        					</div>
        					<div class="col-md-1 form-group"></div>
        					<div class="col-md-2 form-group">
        						 <select  name="att02_sel" id="att02_sel" onchange='setScore("att02_score",$(this).find("option:selected").attr("dScore"));preAF("att02_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr01_cat","catscr01","sc_attr01",$(this).find("option:selected").attr("dScore")); getValue("att02_sel");' class="form-control" required="required">
                                        <option value="">Select</option>
                                        <option dScore='2'  pAFscr='2'  value="YES">YES</option>
                                        <option dScore='0'  pAFscr='0'  value="NO">NO</option>
                                        <option dScore='2'  pAFscr='2'  value="NA">NA</option>
                                        <option dScore='AF' pAFscr='2'  value="FATAL">FATAL</option>
                                        <option dScore='AF' pAFscr='2'  value="Zero Tolerance">Zero Tolerance</option>
                                        <option dScore='AF' pAFscr='2'  value="Red Alert">Red Alert</option>
                                    </select>
        					</div>
        					<div class="col-md-2 form-group">
        						<select name="reason02_sel" id="reason02_sel" class="form-control">
                                        <option value="">Select </option>
                                        <option value="Security check not done">Security check not done </option>
                                        <option value="Partial check - Did not ask for Seller's Registered Number">Partial check - Did not ask for Seller's Registered Number</option>
                                        <option value="Partial check - Did not ask for Seller's Registered Email ID">Partial check - Did not ask for Seller's Registered Email ID</option>
                                        <option value="Information given - Security check failed by seller">Information given - Security check failed by seller</option>
                                    </select>
        					</div>
        					<div class="col-md-3 form-group">
        						<textarea id="att02_com" name="att02_com" value="" ></textarea>
        					</div>
        					<div class="col-md-2 form-group">
        						<input type="text"  readonly id="att02_score" name="att02_score" value="" class="center form-control scr catscr01">
                                <input type="hidden"  id="att02_pafscore" value="" class="center form-control pf_scr">
        					</div>
        				</div>
        				<div class="row">
        					<div class="col-md-2 form-group">
        						Closing Greeting Followed
        					</div>
        					<div class="col-md-1 form-group"></div>
        					<div class="col-md-2 form-group">
        						<select  name="att03_sel" id="att03_sel" onchange='setScore("att03_score",$(this).find("option:selected").attr("dScore"));preAF("att03_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr01_cat","catscr01","sc_attr01",$(this).find("option:selected").attr("dScore")); getValue("att03_sel");' class="form-control" required="required">
                            	        <option value="">Select</option>
                                        <option dScore='3'  pAFscr='3' value="YES">YES</option>
                                        <option dScore='0' pAFscr='0'  value="NO">NO</option>
                                        <option dScore='3' pAFscr='3'  value="NA">NA</option>
                                        <option dScore='AF' pAFscr='3' value="FATAL">FATAL</option>
                                        <option dScore='AF' pAFscr='3' value="Zero Tolerance">Zero Tolerance</option>
                                        <option dScore='AF' pAFscr='3' value="Red Alert">Red Alert</option>
                                </select>
        					</div>
        					<div class="col-md-2 form-group">
        						<select name="reason03_sel" class="form-control" id="reason03_sel">
                                        <option value="">Select</option>
                                        <option value="Failed to offer further assistance">Failed to offer further assistance</option>
                                        <option value="Altered Flipkart closing greeting">Altered Flipkart closing greeting</option>
                                        <option value="Did not extend closing greeting when opportunity existed">Did not extend closing greeting when opportunity existed</option>
                                        <option value="Promotion for SSAT and solicitating on calls/emails">Promotion for SSAT and solicitating on calls/emails</option>
                                        <option value="Call disconnection while seller on call">Call disconnection while seller on call</option>
                                        <option value="Delayed Closing/Disconnection">Delayed Closing/Disconnection</option>
                                        <option value="Didn't give disclaimer before disconnection">Didn't give disclaimer before disconnection</option>
                                    </select>
        					</div>
        					<div class="col-md-3 form-group">
        						<textarea  id="att03_com" name="att03_com" ></textarea>
        					</div>
        					<div class="col-md-2 form-group">
        						<input type="text"  readonly id="att03_score" name="att03_score" value="" class="center form-control scr catscr01">
                                    <input type="hidden" id="att03_pafscore" value="" class="center form-control pf_scr">
        					</div>
        				</div>
        				<div class="row">
        					<div class="col-md-2 form-group">
        						Hold/Transfer/Escalation Protocol followed
        					</div>
        					<div class="col-md-1 form-group"></div>
        					<div class="col-md-2 form-group">
        						  <select  name="att04_sel" id="att04_sel" onchange='setScore("att04_score",$(this).find("option:selected").attr("dScore"));preAF("att04_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr01_cat","catscr01","sc_attr01",$(this).find("option:selected").attr("dScore")); getValue("att04_sel");' class="form-control" required="required">
                                        <option value="">Select</option>
                                        <option dScore='4' 	pAFscr='4'  value="YES">YES</option>
                                        <option dScore='0' 	pAFscr='0'  value="NO">NO</option>
                                        <option dScore='4' 	pAFscr='4'  value="NA">NA</option>
                                        <option dScore='AF' pAFscr='4' value="FATAL">FATAL</option>
                                        <option dScore='AF' pAFscr=''  value="Zero Tolerance">Zero Tolerance</option>
                                        <option dScore='AF' pAFscr='4' value="Red Alert">Red Alert</option>
                                    </select>
        					</div>
        					<div class="col-md-2 form-group">
        						<select name="reason04_sel" class="form-control" id="reason04_sel">
                                        <option value="">Select</option>
                                        <option value="Did not seek seller's permission before placing the call on hold">Did not seek seller's permission before placing the call on hold</option>
                                        <option value="Did not put the call on hold even after informing the seller about the hold leading to dead air">Did not put the call on hold even after informing the seller about the hold leading to dead air</option>
                                        <option value="Used mute instead of hold" >Used mute instead of hold</option>
                                        <option value="Did not place the seller on hold when required" >Did not place the seller on hold when required</option>
                                        <option value="Hold not refreshed within stated threshold(2mints)">Hold not refreshed within stated threshold(2mints)</option>
                                        <option value="Dead air more than 10 sec">Dead air more than 10 sec</option>
                                        <option value="Went blank on call more than once">Went blank on call more than once</option>
                                        <option value="Unnecessarily escalates the call - Should attempt twice to assist the seller before escalating the call">Unnecessarily escalates the call - Should attempt twice to assist the seller before escalating the call</option>
                                        <option value="Did not seek opportunity from the Seller to assist when asked for escalation, puts the call on hold without informing the seller">Did not seek opportunity from the Seller to assist when asked for escalation, puts the call on hold without informing the seller</option>
                                        <option value="Multiple de-escalations attempts making the seller irate">Multiple de-escalations attempts making the seller irate</option>
                                        <option value="Did not offer/arrange for call back in case supervisor not available">Did not offer/arrange for call back in case supervisor not available</option>
                                        <option value="Denied/Did not escalate the call to the supervisor">Denied/Did not escalate the call to the supervisor</option>
                                    </select>
        					</div>
        					<div class="col-md-3 form-group">
        						<textarea  id="att04_com" name="att04_com"></textarea>
        					</div>
        					<div class="col-md-2 form-group">
        						 <input type="text"  readonly id="att04_score" name="att04_score" value="" class="center form-control scr catscr01">
                                    <input type="hidden" id="att04_pafscore"  value="" class="center form-control pf_scr">
        					</div>
        				</div>
      				</div>
    			</div>
  			</div>
  			<!-- End Compliance -->
  			<!-- Documentation -->
  			<div class="card z-depth-0 bordered">
    			<div class="card-header" id="headingTwo2">
      				<h5 class="mb-0">
        				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
          				<i class="fa fa-chevron-right" aria-hidden="true"></i>Documentation
        				</button>
      				</h5>
      				<span style="float: right;margin-top:-2.6%;color:#009688;font-weight: 400">Score: <span id="sc_attr02"></span></span>
    			</div>
    			<div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo2" data-parent="#accordionExample275">
      				<div class="card-body">
        				<div class="row">
        					<div class="col-md-2 form-group">
        						<label>Complete &#38; Correct Documentation</label>        						
        					</div>
        					<div class="col-md-1 form-group"></div>
        					<div class="col-md-2 form-group">
        						<select  name="att05_sel" id="att05_sel" onchange='setScore("att05_score",$(this).find("option:selected").attr("dScore"));preAF("att05_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr02_cat","catscr02","sc_attr02",$(this).find("option:selected").attr("dScore")); getValueDocumentation("att05_sel");'  class="form-control" required="required">
                                        <option value="">Select</option>
                                        <option dScore='15' pAFscr='15' value="YES">YES</option>
                                        <option dScore='0' pAFscr='0'   value="NO">NO</option>
                                        <option dScore='15' pAFscr='15' value="NA">NA</option>
                                        <option dScore='AF' pAFscr='15' value="FATAL">FATAL</option>
                                        <option dScore='AF' pAFscr='15' value="Zero Tolerance">Zero Tolerance</option>
                                        <option dScore='AF' pAFscr='15' value="Red Alert">Red Alert</option>
                                    </select>
        					</div>
        					<div class="col-md-2 form-group">
        						<select name="reason05_sel" class="form-control" id="reason05_sel">
                                   	<option value="">Select</option>
                                    <option value="Documentation not done">Documentation not done</option>
                           	        <option value="All queries not tagged">All queries not tagged </option>
                                    <option value="Incorrect Type/Subtype/Sub Subtype selected">Incorrect Type/Subtype/Sub Subtype selected</option>
                                    <option value="Used Issue type to acknowledge seller's query (exception if Issue type name is…)">Used Issue type to acknowledge seller's query (exception if Issue type name is…)</option>
                                    <option value="Incorrect Disposition">Incorrect Disposition</option>
                                    <option value="Incorrect Disposition - to avoid survey">Incorrect Disposition - to avoid survey </option>
                                    <option value="Documentation on incorrect account">Documentation on incorrect account</option>
                                    <option value="Incorrect information mentioned in Notes">Incorrect information mentioned in Notes</option>
                                    <option value="Incorrect TAT mentioned in Notes">Incorrect TAT mentioned in Notes</option>
                                    <option value="No TAT mentioned in Notes">No TAT mentioned in Notes</option>
                                    <option value="Incorrect/Incomplete/Misleading Notes captured other than the ones discussed in the call/email.">Incorrect/Incomplete/Misleading Notes captured other than the ones discussed in the call/email.</option>
                                    <option value="Assigning incident to wrong team"> Assigning incident to wrong team</option>
                                    <option value="Assigning incident twice to L2">Assigning incident twice to L2</option>
                                    <option value="Did not assign the incident">Did not assign the incident </option>
                                    <option value="Did not mention 'Relevant team' name">Did not mention "Relevant team" name</option>
                                    <option value="Did not mention the right 'Relevant team' name">Did not mention the right 'Relevant team' name</option>
                                    <option value="Failed to send Email to the seller when necessary">Failed to send Email to the seller when necessary
                                    </option>
                                    <option value="Using any ID other than self user ID">Using any ID other than self user ID</option>
                                </select>       						
        					</div>
        					<div class="col-md-3 form-group">
        						<textarea id="att05_com" name="att05_com"></textarea>
        					</div>
        					<div class="col-md-2 form-group">
        						<input type="text"  readonly id="att05_score" name="att05_score" value="" class="center form-control scr catscr02">
                                    <input type="hidden"  id="att05_pafscore" value="" class="center form-control pf_scr">
        					</div>
        				</div>
      				</div>
    			</div>
  			</div>
  			<!-- End Documentation -->
  			<!-- Resolution -->
  			<div class="card z-depth-0 bordered">
    			<div class="card-header" id="headingThree2">
      				<h5 class="mb-0">
        				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
          				<i class="fa fa-chevron-right" aria-hidden="true"></i>Resolution
        				</button>
      				</h5>
      				<span style="float: right;margin-top:-2.6%;color:#009688;font-weight: 400">Score: <span id="sc_attr03"></span></span>
    			</div>
    			<div id="collapseThree2" class="collapse" aria-labelledby="headingThree2" data-parent="#accordionExample275">
      				<div class="card-body">
      					<div class="row">
      						<div class="col-md-2 form-group">Probing</div>
      						<div class="col-md-1 form-group"></div>
        					<div class="col-md-2 form-group">
	        					<select  name="att06_sel" id="att06_sel" onchange='setScore("att06_score",$(this).find("option:selected").attr("dScore"));preAF("att06_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr03_cat","catscr03","sc_attr03",$(this).find("option:selected").attr("dScore")); getValueResolution("att06_sel");'  class="form-control" required="required">
	                            	<option value="">Select</option>
	                            	<option dScore='10' pAFscr='10' value="YES">YES</option>
	                            	<option dScore='0'  pAFscr='0'  value="NO">NO</option>
	                            	<option dScore='10' pAFscr='10' value="NA">NA</option>
	                        	</select>
                        	</div>
                        	<div class="col-md-2 form-group">
                        		<select name="reason06_sel" class="form-control" id="reason06_sel">
                                    <option value="">Select</option>
                                    <option value="Did not use effective questioning technique to gather additional information ">Did not use effective questioning technique to gather additional information </option>
                                    <option value="Asked unclear questions">Asked unclear questions</option>
                                    <option value="Did not probe when required">Did not probe when required</option>
                                    <option value="Did not use system information for identifying Seller's concern" >Did not use system information for identifying Seller's concern</option>
                                    <option value="Assumed the cause of concern">Assumed the cause of concern</option>
                                    <option value="Failed to paraphrase seller's query/concern">Failed to paraphrase seller's query/concern</option>
                                </select>
                        	</div>
                        	<div class="col-md-3 form-group">
                        		<textarea id="att06_com" name="att06_com"></textarea>
                        	</div>
                        	<div class="col-md-2 form-group">
                        		<input type="text"  readonly id="att06_score" value="" name="att06_score" class="center form-control scr catscr03">
                                <input type="hidden"  id="att06_pafscore" value="" class="center form-control pf_scr">
                        	</div>
                        </div>
                        <div class="row">
      						<div class="col-md-2 form-group">Leverage System Tools</div>
      						<div class="col-md-1 form-group"></div>
        					<div class="col-md-2 form-group">
	        					<select  name="att07_sel" id="att07_sel" onchange='setScore("att07_score",$(this).find("option:selected").attr("dScore"));preAF("att07_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr03_cat","catscr03","sc_attr03",$(this).find("option:selected").attr("dScore")); getValueResolution("att07_sel");'  class="form-control" required="required">
                                    <option value="">Select</option>
                                    <option dScore='5'  pAFscr='5'  value="YES">YES</option>
                                    <option dScore='0'  pAFscr='0' value="NO">NO</option>
                                    <option dScore='5'  pAFscr='5'  value="NA">NA</option>
                                    <option dScore='AF' pAFscr='5' value="FATAL">FATAL</option>
                                </select>
                        	</div>
                        	<div class="col-md-2 form-group">
                        		<select name="reason07_sel" class="form-control" id="reason07_sel">
                                    <option value="">Select</option>
                                    <option value="Did not check any tool leading to incomplete/inaccurate resolution">Did not check any tool leading to incomplete/inaccurate resolution</option>
                                    <option value="Did not check ALC">Did not check ALC</option>
                                    <option value="Did not check SUV">Did not check SUV</option>
                                    <option value="Did not check Seller Portal">Did not check Seller Portal </option>
                                    <option value="Did not check IMS">Did not check IMS</option>
                                    <option value="Did not check FK Website">Did not check FK Website</option>
                                    <option value="Did not check Gmail (CT/L2)">Did not check Gmail (CT/L2)</option>
                                    <option value="Did not check L&C Tools">Did not check L&C Tools</option>
                                    <option value="Did not check O&L Tools">Did not check O&L Tools</option>
                                </select>
                        	</div>
                        	<div class="col-md-3 form-group">
                        		<textarea id="att07_com" name="att07_com" ></textarea>
                        	</div>
                        	<div class="col-md-2 form-group">
                        		<input type="text"  readonly id="att07_score" name="att07_score" class="center form-control scr catscr03">
                                <input type="hidden"  id="att07_pafscore" class="center form-control pf_scr">
                        	</div>
                        </div>
                        <div class="row">
      						<div class="col-md-2 form-group">Correct information/resolution provided</div>
      						<div class="col-md-1 form-group"></div>
        					<div class="col-md-2 form-group">
        						<select  name="att08_sel" id="att08_sel" onchange='setScore("att08_score",$(this).find("option:selected").attr("dScore"));preAF("att08_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr03_cat","catscr03","sc_attr03",$(this).find("option:selected").attr("dScore")); getValueResolution("att08_sel");' class="form-control" required="required">
                                    <option value="">Select</option>
                                    <option dScore='30' pAFscr='30' value="YES">YES</option>
                                    <option dScore='0'  pAFscr='0'  value="NO">NO</option>
                                    <option dScore='30' pAFscr='30' value="NA">NA</option>
                                    <option dScore='AF' pAFscr='30' value="FATAL">FATAL</option>
                                </select>
                        	</div>
                        	<div class="col-md-2 form-group">
                        		<select name="reason08_sel" class="form-control" id="reason08_sel">
                                    <option value="">Select</option>
                                    <option value="Did not provide complete mandatory information">Did not provide complete mandatory information</option>
                                    <option value="Did not provide accurate mandatory information">Did not provide accurate mandatory information</option>
                                    <option value="Incorrect TAT given">Incorrect TAT given</option>
                                    <option value="No TAT given">No TAT given</option>
                                    <option value="Incorrect service denial">Incorrect service denial</option>
                                    <option value="Forceful closure">Forceful closure</option>
                                    <option value="Did not escalate to the relevant team">Did not escalate to the relevant team </option>
                                    <option value="Unnecessary escalation when not required">Unnecessary escalation when not required</option>
                                    <option value="Does not correct Seller's understanding in case of incorrect understanding, leading to incorrect resolution">Does not correct Seller's understanding in case of incorrect understanding, leading to incorrect resolution</option>
                                    <option value="Did not complete required action(s) in the system to enable resolution">
                                    Did not complete required action(s) in the system to enable resolution	</option>
                                    <option value="Incomplete/Inaccurate actions taken">Incomplete/Inaccurate actions taken</option>
                                    <option value="Did not perform  follow up actions as desired">Did not perform  follow up actions as desired</option>
                                    <option value="Ineffective objection handling">Ineffective objection handling</option>
                                    <option value="Missed to address the seller's secondary or additional concern">Missed to address the seller's secondary or additional concern</option>
                                    <option value="Missed send attachment when necessary">Missed send attachment when necessary</option>
                                    <option value="Did not assign the incident">Did not assign the incident </option>
                                    <option value="Assigning incident to wrong team">Assigning incident to wrong team </option>
                                </select>
                        		
                        	</div>
                        	<div class="col-md-3 form-group">
                        		<textarea id="att08_com" name="att08_com"></textarea>
                        	</div>
                        	<div class="col-md-2 form-group">
                        		<input type="text"  readonly id="att08_score" name="att08_score" value="" class="center form-control scr catscr03">
                                <input type="hidden"  id="att08_pafscore" value="" class="center form-control pf_scr">
                        	</div>
                        </div>
                        <div class="row">
      						<div class="col-md-2 form-group">Provided proactive information (beyond what was asked for)</div>
      						<div class="col-md-1 form-group"></div>
        					<div class="col-md-2 form-group">
	        					<select  name="att09_sel" id="att09_sel" onchange='setScore("att09_score",$(this).find("option:selected").attr("dScore"));preAF("att09_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr03_cat","catscr03","sc_attr03",$(this).find("option:selected").attr("dScore")); getValueResolution("att09_sel");' class="form-control" required="required">
                                    <option value="">Select</option>
        	                        <option dScore='2' pAFscr='2' value="YES">YES</option>
                                    <option dScore='0' pAFscr='0' value="NO">NO</option>
                                    <option dScore='2' pAFscr='2' value="NA">NA</option>
                                </select>
                        	</div>
                        	<div class="col-md-2 form-group">
                        		<select name="reason09_sel" class="form-control" id="reason09_sel">
                                    <option value="">Select</option>
                                    <option value="Did not provide complete proactive information inline with the issue for which the seller has called">Did not provide complete proactive information inline with the issue for which the seller has called</option>
                                    <option value="Did not provided additional information as defined in the SOPs">Did not provided additional information as defined in the SOPs</option>
                                    <option value="Failed to promote self-serve" >Failed to promote self-serve</option>
                                    <option value="Failed to educate the seller on Self Help process">Failed to educate the seller on Self Help process
                                    </option>
                                </select>
                        	</div>
                        	<div class="col-md-3 form-group">
                        		<textarea id="att09_com" name="att09_com"></textarea>
                        	</div>
                        	<div class="col-md-2 form-group">
                        		<input type="text"  readonly id="att09_score" name="att09_score" value="" class="center form-control scr catscr03">
                                <input type="hidden"  id="att09_pafscore" value="" class="center form-control pf_scr">
                        	</div>
                        </div>
      				</div>
    			</div>
  			</div>
  			<!-- End Resolution -->
  			<!-- Seller handling -->
  			<div class="card z-depth-0 bordered">
    			<div class="card-header" id="headingThree3">
      				<h5 class="mb-0">
        				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
          				<i class="fa fa-chevron-right" aria-hidden="true"></i>Seller handling
        				</button>
      				</h5>
      				<span style="float: right;margin-top:-2.6%;color:#009688;font-weight: 400">Score: <span id="sc_attr04"></span></span>
    			</div>
    			<div id="collapseThree3" class="collapse" aria-labelledby="headingThree3" data-parent="#accordionExample275">
      				<div class="card-body">
        				<div class="row">
        					<div class="col-md-2 form-group">
        						Attentiveness &#38; Patience
        					</div>
        					<div class="col-md-1 form-group"></div>
        					<div class="col-md-2 form-group">
        						<select  name="att10_sel" id="att10_sel" onchange='setScore("att10_score",$(this).find("option:selected").attr("dScore"));preAF("att10_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr04_cat","catscr04","sc_attr04",$(this).find("option:selected").attr("dScore")); getValueSellerhandling("att10_sel");' class="form-control" required="required">
                        	        <option value="">Select</option>
                                    <option dScore='8' pAFscr='8' value="YES">YES</option>
                                    <option dScore='0' pAFscr='0' value="NO">NO</option>
                                </select>
        					</div>
        					<div class="col-md-2 form-group">
        						<select name="reason10_sel" class="form-control" id="reason10_sel">
                                    <option value="">Select</option>
                                    <option value="Interruptions observed">Interruptions observed </option>
                                    <option value="Did not stop when seller interrupted">Did not stop when seller interrupted</option>
                                    <option value="Asking same information repeatedly from the seller">Asking same information repeatedly from the seller
                                    </option>
                                    <option value="Rushed through the call/Fast rate of speech">Rushed through the call/Fast rate of speech</option>
                                    <option value="Sent more than 1 response to the seller">Sent more than 1 response to the seller</option>
                                    <option value="Did not seek clarity incase seller response/email not clear">Did not seek clarity incase seller response/email not clear</option>
                                </select>
        					</div>
        					<div class="col-md-3 form-group">
        						<textarea id="att10_com" name="att10_com"></textarea>
        					</div>
        					<div class="col-md-2 form-group">
        						<input type="text"  readonly id="att10_score" value="" name="att10_score" class="center form-control scr catscr04">
                                <input type="hidden"  id="att10_pafscore" value="" class="center form-control pf_scr">
        					</div>
        				</div>
        				<div class="row">
        					<div class="col-md-2 form-group">
        						Seller Engagement
        					</div>
        					<div class="col-md-1 form-group"></div>
        					<div class="col-md-2 form-group">
        						<select  name="att11_sel" id="att11_sel" onchange='setScore("att11_score",$(this).find("option:selected").attr("dScore"));preAF("att11_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr04_cat","catscr04","sc_attr04",$(this).find("option:selected").attr("dScore")); getValueSellerhandling("att11_sel");' class="form-control" required="required">
                                    <option value="">Select</option>
                                    <option dScore='6' pAFscr='6' value="YES">YES</option>
                                    <option dScore='0' pAFscr='0' value="NO">NO</option>
                                </select>
        					</div>
        					<div class="col-md-2 form-group">
        						<select name="reason11_sel" class="form-control" id="reason11_sel">
                                    <option value="">Select</option>
                                    <option value="Did not acknowledge the Seller when required">Did not acknowledge the Seller when required</option>
                                    <option value="Did not address the Seller by name or right salutation">Did not address the Seller by name or right salutation</option>
                                    <option value="Missed to take ownership of seller's issue">Missed to take ownership of seller's issue</option>
                                    <option value="Dead air more than 10 seconds">Dead air more than 10 seconds</option>
                                    <option value="Went blank on call more than once">Went blank on call more than once</option>
                                </select>
        					</div>
        					<div class="col-md-3 form-group">
        						<textarea id="att11_com" name="att11_com" value=""></textarea>
        					</div>
        					<div class="col-md-2 form-group">
        						<input type="text"  readonly id="att11_score" name="att11_score" value="" class="center form-control scr catscr04">
                                <input type="hidden"  id="att11_pafscore" value="" class="center form-control pf_scr">
        					</div>
        				</div>
        				<div class="row">
        					<div class="col-md-2 form-group">
        						Communication Skills
        					</div>
        					<div class="col-md-1 form-group"></div>
        					<div class="col-md-2 form-group">
        						<select  name="att12_sel" id="att12_sel" onchange='setScore("att12_score",$(this).find("option:selected").attr("dScore"));preAF("att12_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr04_cat","catscr04","sc_attr04",$(this).find("option:selected").attr("dScore")); getValueSellerhandling("att12_sel");' class="form-control" required="required">
                                    <option value="">Select</option>
                                    <option dScore='4' pAFscr='4' value="YES">YES</option>
                                    <option dScore='0' pAFscr='0' value="NO">NO</option>
                                </select>
        					</div>
        					<div class="col-md-2 form-group">
        						<select name="reason12_sel" class="form-control" id="reason12_sel">
                                    <option value="">Select</option>
                                    <option value="Used casual language">Used casual language</option>
                                    <option value="Directed Seller to speak in a different language">Directed Seller to speak in a different language
                                    </option>
                                    <option value="Frequently uses Jargons without explanation">Frequently uses Jargons without explanation</option>
                                    <option value="Highly accented pronunciation">Highly accented pronunciation</option>
                                    <option value="Lacks clarity of speech">Lacks clarity of speech</option>
                                    <option value="Stammers or Fumbles frequently">Stammers or Fumbles frequently</option>
                                    <option value="Incorrect sentence construction">Incorrect sentence construction</option>
                                    <option value="Unable to speak in seller's preferred language (Only for Eng & Hindi)">Unable to speak in seller's preferred language (Only for Eng &#38; Hindi)</option>
                                    <option value="Consultant did not ask relevant question to understand customer requirement – did not comprehend customer requirement – did not suggested alternatives" >Consultant did not ask relevant question to understand customer requirement – did not comprehend customer requirement – did not suggested alternatives </option>
                                    <option value="Did not handle the objection appropriately">Did not handle the objection appropriately</option>
                                    <option value="Switched languages during the call">Switched languages during the call</option>
                                    <option value="Grammatical errors during the conversation, which is impacting the conversation">Grammatical errors during the conversation, which is impacting the conversation</option>
                                    <option value="Spelling mistakes while creating the customer proxy or response">Spelling mistakes while creating the customer proxy or response</option>
                                </select>
        					</div>
        					<div class="col-md-3 form-group">
        						 <textarea id="att12_com" name="att12_com"></textarea>
        					</div>
        					<div class="col-md-2 form-group">
        						<input type="text"  readonly id="att12_score" name="att12_score" value="" class="center form-control scr catscr04">
                                    <input type="hidden"  id="att12_pafscore" value="" class="center form-control pf_scr">
        					</div>
        				</div>
        				<div class="row">
        					<div class="col-md-2 form-group">
        						Courtesy &#38; Professionalism
        					</div>
        					<div class="col-md-1 form-group"></div>
        					<div class="col-md-2 form-group">
        						<select  name="att13_sel" id="att13_sel" onchange='setScore("att13_score",$(this).find("option:selected").attr("dScore"));preAF("att13_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr04_cat","catscr04","sc_attr04",$(this).find("option:selected").attr("dScore")); getValueSellerhandling("att13_sel");' class="form-control" required="required">
                                    <option value="">Select</option>
                                    <option dScore='8'  pAFscr='8' value="YES">YES</option>
                                    <option dScore='0'  pAFscr='0' value="NO">NO</option>
                                    <option dScore='AF' pAFscr='8' value="FATAL">FATAL</option>
                                </select>
        					</div>
        					<div class="col-md-2 form-group">
        						<select name="reason13_sel" class="form-control" id="reason13_sel">
                                        <option value="">Select</option>
                                        <option value="Curt/Blunt way of responding">Curt/Blunt way of responding</option>
                                        <option value="Abrupt response">Abrupt response</option>
                                        <option value="Unconcerned tone">Unconcerned tone</option>
                                        <option value="Did not apologize/Empathize when required">Did not apologize/Empathize when required</option>
                                        <option value="Used incorrect Seller's name/title">Used incorrect Seller's name/title</option>
                                        <option value="Casual way of response reflecting disinterest">Casual way of response reflecting disinterest</option>
                                        <option value="Seller checking if agent is still on call">Seller checking if agent is still on call</option>
                                    </select>
        					</div>
        					<div class="col-md-3 form-group">
        						<textarea  id="att13_com" name="att13_com"></textarea>
        					</div>
        					<div class="col-md-2 form-group">
        						<input type="text"  readonly id="att13_score" name="att13_score" value="" class="center form-control scr catscr04">
                                <input type="hidden"  id="att13_pafscore" value="" class="center form-control pf_scr">
        					</div>
        				</div>
      				</div>
    			</div>
  			</div>
  			<!-- ENd Seller handling -->
  			<!-- Intelligence Parameters -->
  			<div class="card z-depth-0 bordered">
    			<div class="card-header" id="headingThree4">
      				<h5 class="mb-0">
        				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree4" aria-expanded="false" aria-controls="collapseThree4">
          				<i class="fa fa-chevron-right" aria-hidden="true"></i>Intelligence Parameters
        				</button>
      				</h5>
      				<span style="float: right;margin-top:-2.6%;color:#009688;font-weight: 400">Score: <span id="sc_attr05"></span></span>
    			</div>
    			<div id="collapseThree4" class="collapse" aria-labelledby="headingThree4" data-parent="#accordionExample275">
      				<div class="card-body">
						<div class="row">
							<div class="col-md-4 form-group">
								Was this a perfect contact from Seller point. Did the seller get the resolution he expected
							</div>
							<div class="col-md-1 form-group"></div>
							<div class="col-md-2 form-group">
								<select  name="att14_sel" id="att14_sel" onchange='setScore("att14_score",$(this).find("option:selected").attr("dScore"));preAF("att14_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr05_cat","catscr05","sc_attr05",$(this).find("option:selected").attr("dScore"));pcscore($(this).val());'  class="form-control" required="required">
                                    <option value="">Select</option>
                                    <option dScore='0' pAFscr='0' value="YES">YES</option>
                                    <option dScore='0' pAFscr='0' value="NO">NO</option>
                                </select>
							</div>
							<div class="col-md-3 form-group">
								<textarea id="att14_com" name="att14_com"></textarea>
							</div>
							<div class="col-md-2 form-group">
								<input type="text"  readonly id="att14_score" value="" name="att14_score" class="center form-control scr catscr05">
                                <input type="hidden"  id="att14_pafscore" class="center form-control pf_scr">
							</div>
						</div>        				
						<div class="row">
							<div class="col-md-4 form-group">
								Was there an opportunity to handle the call in lesser time ?
							</div>
							<div class="col-md-1 form-group"></div>
							<div class="col-md-2 form-group">
								<select  name="att15_sel" id="att15_sel" onchange='setScore("att15_score",$(this).find("option:selected").attr("dScore"));preAF("att15_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr05_cat","catscr05","sc_attr05",$(this).find("option:selected").attr("dScore"));'   class="form-control" required="required">
                                    <option value="">Select</option>
                                    <option dScore='0' pAFscr='0' value="YES">YES</option>
                                    <option dScore='0' pAFscr='0' value="NO">NO</option>
                                </select>
							</div>
							<div class="col-md-3 form-group">
								<textarea id="att15_com" name="att15_com" value=""></textarea>
							</div>
							<div class="col-md-2 form-group">
								<input type="text"  readonly id="att15_score" name="att15_score" value="" class="center form-control scr catscr05">
                                <input type="hidden"  id="att15_pafscore" class="center form-control pf_scr">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								Will the interaction generate a repeat ? 
							</div>
							<div class="col-md-1 form-group"></div>
							<div class="col-md-2 form-group">
								<select  name="att16_sel" id="att16_sel" onchange='setScore("att16_score",$(this).find("option:selected").attr("dScore"));preAF("att16_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr05_cat","catscr05","sc_attr05",$(this).find("option:selected").attr("dScore"));' class="form-control" required="required">
                                    <option value="">Select</option>
                                    <option dScore='0' pAFscr='0' value="YES">YES</option>
                                    <option dScore='0' pAFscr='0' value="NO">NO</option>
                                </select>
							</div>
							<div class="col-md-3 form-group">
								<textarea id="att16_com" name="att16_com"></textarea>
							</div>
							<div class="col-md-2 form-group">
								<input type="text"  readonly id="att16_score" name="att16_score" value="" class="center form-control scr catscr05">
                                <input type="hidden"  id="att16_pafscore" class="center form-control pf_scr">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								What will be the reasons for repeat call being generated ? 
							</div>
							<div class="col-md-1 form-group"></div>
							<div class="col-md-2 form-group">
								<select  name="att17_sel" id="att17_sel" onchange='setScore("att17_score",$(this).find("option:selected").attr("dScore"));preAF("att17_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr05_cat","catscr05","sc_attr05",$(this).find("option:selected").attr("dScore"));' class="form-control" required="required">
                                    <option value="">Select</option>
                                    <option dScore='0' pAFscr='0' value="REASON">REASON</option>
                                </select>
							</div>
							<div class="col-md-3 form-group">
								<textarea  id="att17_com" name="att17_com"></textarea>
							</div>
							<div class="col-md-2 form-group">
								<input type="text"  readonly id="att17_score" name="att17_score" value="" class="center form-control scr catscr05">
                                <input type="hidden"  id="att17_pafscore" class="center form-control pf_scr">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								Is the content updated in ALC
							</div>
							<div class="col-md-1 form-group"></div>
							<div class="col-md-2 form-group">
								<select  name="att18_sel" id="att18_sel" onchange='setScore("att18_score",$(this).find("option:selected").attr("dScore"));preAF("att18_pafscore",$(this).find("option:selected").attr("pAFscr"));catScore("attr05_cat","catscr05","sc_attr05",$(this).find("option:selected").attr("dScore"));' class="form-control" required="required">
                                        <option value="">Select</option>
                                        <option dScore='0' pAFscr='0' value="YES">YES</option>
                                        <option dScore='0' pAFscr='0' value="NO">NO</option>
                                        <option dScore='0' pAFscr='0' value="NA">NA</option>
                                    </select>
							</div>
							<div class="col-md-3 form-group">
								<textarea id="att18_com" name="att18_com" value=""></textarea>
							</div>
							<div class="col-md-2 form-group">
								<input type="text"  readonly id="att18_score" name="att18_score" value="" class="center form-control scr catscr05">
                                <input type="hidden"  id="att18_pafscore" class="center form-control pf_scr">
							</div>
						</div>        				
      				</div>
    			</div>
  			</div>
  			<!-- End Intelligence Parameters -->
		</div>


		<div>
  			<div class="card z-depth-0 bordered"> 
    			<div class="card-header" id="headingOne2">
      				<h5 class="mb-0">
        				<button class="btn btn-link" type="button">
          				Training Call Type
        				</button>
      				</h5>
    			</div>
    			<div id="collapseOne22" class="collapse12">
      				<div class="card-body">  
      					<div class="row">
      						<div class="col-md-4">
      							<select  name="tcall_type" id="tcall_type" class="form-control">
                        			<option value="">Select</option>
                        			<option value="Good Call">Good Call</option>
                        			<option value="Bad Call">Bad Call</option>
                        			<option value="Zero Tolerance">Zero Tolerance</option>
                        			<option value="Red Alert">Red Alert</option>
                    			</select>
      						</div>
      						<div class="col-md-8">
      							<textarea id="tcall_type_comm" name="tcall_type_comm" placeholder="Reason......"></textarea>
      						</div>
      					</div>
        			</div>
      			</div>
    		</div>
  		</div>
  		<div>
  			<div class="card z-depth-0 bordered"> 
    			<div class="card-header" id="headingOne2">
      				<h5 class="mb-0">
        				<button class="btn btn-link" type="button" >
          				OverAll Comment
      				</h5>
    			</div>
    			<div id="collapseOne2" class="collapse1">
      				<div class="card-body">  
      					<div class="row">
      						<div class="col-md-12 form-group">
      							<textarea id="over_comm" name="over_comm" placeholder="Please Comment Here......"></textarea>
      						</div>
      					</div>
        			</div>
      			</div>
    		</div>
  		</div>
  		<hr>
		<div class="row">
			<div class="col-md-12 text-center form-group">
				<input type="submit" value="Submit" class="btn btn-primary" autocomplete="off"></div>
		</div>
		
		<!-- Loder  -->
		<div class="overlay" style="display: none;">
			<div class="m-loader mr-4">
				<svg class="m-circular" viewBox="25 25 50 50">
					<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"></circle>
				</svg>
			</div>
			<h3 class="l-text">Loading</h3>
		</div>
		<!-- Loder  -->
		
	</div>
</form>
@endsection

