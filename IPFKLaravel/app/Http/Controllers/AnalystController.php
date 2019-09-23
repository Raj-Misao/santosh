<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class AnalystController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$where1 = ['evaluator_id'=>Auth::user()->empid,'status'=>'1'];
    	$where2 = ['evaluator_id'=>Auth::user()->empid,'status'=>'0'];
    	$data['title']				=	"QA-Info | Interaction";
    	$data['headerName'] 		= 	"Interaction";
    	$data['evaluated_mail'] 	= 	DB::table('fk_mail_data')->where($where1)->count();
		$data['not_evaluated_mail'] = 	DB::table('fk_mail_data')->where($where2)->count();
		$data['evaluated_call'] 	= 	DB::table('fk_call_data')->where($where1)->count();
		$data['not_evaluated_call'] = 	DB::table('fk_call_data')->where($where2)->count();
        return view('Analyst.index',$data);
    }

    public function search(Request $request){
    	$call_type 		= $request->call_type;
    	$eval 			= $request->eval;
    	$interaction 	= $request->interaction;
    	$data = [];
    	$email = ['evaluator_id'=>Auth::user()->empid,'status'=>'1'];
    	$calls = ['evaluator_id'=>Auth::user()->empid,'status'=>'1','call_type'=>$call_type];
    	if($interaction == 'Emails'){    		
    		$data['result']	=	DB::table('fk_mail_data')->where($email)->get();
    		$table = '<table class="table table-hover table-bordered sampleTable" id="">
    				<thead>
                    	<tr>
                    		<th>Unique ID</th>
							<th>Incident ID</th>
							<th>Agent ID</th>
							<th>Agent Name</th>
							<th>Incident Date Time</th>
							<th>Last Updated</th>
							<th>Vendor</th>
							<th>Location</th>
							<th>Lob</th>
							<th>Campaign</th>
							<th>Queue Name</th>
							<th>Customer Name</th>
							<th>Customer ID</th>
							<th>Partner Location</th>
							<th>Assigned To</th>
                		</tr>
              		</thead>';
            if(count($data['result']) > 0){
	            foreach ($data['result'] as $key => $row) {
	            	$id 					=	$row->unique_id;
					$incident_id 			= 	$row->incident_id;
					$agent_id 				= 	$row->agent_id;
					$agent_name 			= 	$row->agent_name;
					$incident_date_time		=	$row->incident_date_time;
					$date_lastupdated 		=	$row->date_lastupdated;
					$vendor 				= 	$row->vendor;
					$campaign 				= 	$row->campaign;
					$location 				= 	$row->location;
					$lob 					=	$row->lob;
					$que_name				=	$row->que_name;
					$part_loc				=	$row->part_loc;
					$cust_name 				=	$row->cust_name;
					$cust_id 				=	$row->cust_id;
					$evaluator 				=	$row->evaluator;
					$version 				=	$row->version;
					$tbl_name 				=	"";
					$form_name 				=   self::getformNamebyheirarchy($campaign,$vendor,$location,$lob,'Mail');
					$form_url 				= 	self::getinsertformURL($form_name,$version,$id);
					$form_view_url 			= 	self::getviewformURL($form_name,$version,$id);
					$form_audit_url 		= 	self::getauditformURL($form_name,$version,$id);
					$tbl_name 				= 	self::getMailTable($form_name);
					$qryform 				= 	"Select * from $tbl_name where unique_id='$id'";
					$resultform  			=  	DB::select($qryform);
					$tbl_name;
					if(count($resultform)>0)
					{
						$str="<a style='color:blue;' href='$form_view_url?id=$id'><u>$id</u></a>";
					}
					else
					{
						$str="<a style='color:blue;' href='$form_url?id=$id'><u>$id</u></a>";
					}
					$table .= "<tr>
									<td>".$str."</td>
									<td>".$incident_id."</td>
									<td>".$agent_id."</td>
									<td>".$agent_name."</td>
									<td>".$incident_date_time."</td>
									<td>".$date_lastupdated."</td>
									<td>".$vendor."</td>
									<td>".$location."</td>
									<td>".$lob."</td>
									<td>".$campaign."</td>
									<td>".$que_name."</td>
									<td>".$cust_name."</td>
									<td>".$cust_id."</td>
									<td>".$part_loc."</td>
									<td>".$evaluator."</td>
								</tr>";
	            }
	        }
	        else{
	   			$table .= "<tr ><td colspan='15' align='center'>No Data Found</td></tr>";
			}
    		$table .= "</table>";
    		return $table;
    	}
    	else
    	{
    		$data['result']	=	DB::table('fk_call_data')->where($calls)->get();
    		$table="";
    		$table .= '<table class="table table-hover table-bordered sampleTable" id="">
							<thead>
                        		<tr>
						   			<th>Unique ID</th>
						  			<th>Call ID</th>
						  			<th>Agent ID</th>
						  			<th>Agent Name</th>
						  			<th>Call Date/Time</th>
						  			<th>Incident ID</th>
						  			<th>Issue Type</th>
						  			<th>Queue Name</th>
						  			<th>Partner Location</th>
						  			<th>Evaluator</th>
                        		</tr>
                      		</thead>';
                      	if(count($data['result']) > 0){
							foreach($data['result'] as $row)
							{
				   				$unique_id 				=$row->unique_id;
				   				$call_id 				=$row->call_id;
				   				$agent_id 				=$row->agent_id;
				   				$agent_name 			=$row->agent_name;
				   				$call_date_time 		=$row->call_date_time;
				   				$incident_id 			=$row->incident_id;
				   				$issue_typ 				=$row->issue_type;
				   				$queue_name 			=$row->que_name;
				   				$part_location 			=$row->part_loc;
				   				$evaluator 				=$row->evaluator;
				   				$campaign 				=$row->campaign;
				   				$vendor 				=$row->vendor;
				   				$location 				=$row->location;
				   				$lob 					=$row->lob;
				   				$version 				=$row->version;
				   				$resultform 			=array();
				    			$form_name 				=self::getformNamebyheirarchy($campaign,$vendor,$location,$lob,'Call');
				   				if($form_name!='SO-Call')
				   				{
				   					$form_url=self::getinsertformURL($form_name,$version,$unique_id);
				   					$form_view_url=self::getviewformURL($form_name,$version,$unique_id);
				   					$form_audit_url=self::getauditformURL($form_name,$version,$unique_id);
				   				}
				   				$tbl_name=self::getCallTable($form_name);
								if($tbl_name=='SO-Call')
								{
            						if($vendor=='Aegis' || $vendor=='AEGIS' || $vendor=='aegis')
            						{
						  				$qryformFBFAEG="Select * from fk_formFBFAEG where unique_id='$unique_id'";
				   						$resultformFBF = DB::select($qryformFBFAEG);
            						}
            						else
            						{
              							$qryformFBF="Select * from fk_formFBF where unique_id='$unique_id'";
				   						$resultformFBF = DB::select($qryformFBF);
            						}
				   					$qryformNFBF="Select * from fk_formNFBF where unique_id='$unique_id'";
				   					$resultformNFBF = DB::select($qryformNFBF);
				   					$FBF_form=0;	
				   					$NFBF_form=0;
				   					if(count($resultformNFBF)>0)
				   					{
				   						$resultform=$resultformNFBF;
				   					}
				   					else if(count($resultformFBF)>0)
				   					{
				   						$resultform=$resultformFBF;
				   					}
								}
								else
								{
									$qryform="Select * from $tbl_name where unique_id='$unique_id'";
				   					$resultform = DB::select($qryform);
								}
				   				if(count($resultform)>0)
				   				{
				   					if($form_name=='SO-Call')
				   					{
				   						$form_view_url=$dbModel->getviewformURL($form_name,$version,$unique_id);
										$str="<a style='color:blue;' href='$form_view_url?id=$unique_id'><u>".$unique_id."</u></a>";
									}
									else
									{
										$str="<a style='color:blue;' href='$form_view_url?id=$unique_id'><u>$unique_id</u></a>";
									}
				   				}
				   				else
				   				{
				   					if($form_name=='SO-Call')
				   					{
              							if($vendor=='Aegis' || $vendor=='AEGIS' || $vendor=='aegis')
              							{
                							$qryFBF="Select insert_url,view_url from form_info where form_name='FBFAEG-Call' and form_version='$version'";
  				   							$res_FBF = DB::select($qryFBF);
  				   							$FBF_insert=$res_FBF[0]->insert_url;
  				   							$FBF_view=$res_FBF[0]->view_url;
              							}
              							else
              							{
                							$qryFBF="Select insert_url,view_url from form_info where form_name='FBF-Call' and form_version='$version'";
  				   							$res_FBF = DB::select($qryFBF);
  				   							$FBF_insert=$res_FBF[0]->insert_url;
  				   							$FBF_view=$res_FBF[0]->view_url;
              							}
				   						$qryNFBF="Select insert_url,view_url from form_info where form_name='NFBF-Call' and form_version='$version'";
				   						$res_NFBF = DB::select($qryNFBF);
				   						$NFBF_insert=$res_NFBF[0]->insert_url;
				   						$NFBF_view=$res_NFBF[0]->view_url;
				   						$str=$unique_id."<br>";
				   						$str.="<a style='color:blue;' href='$NFBF_insert?id=$unique_id'><u>NFBF</u></a><br>";
				   						$str.="<a style='color:blue;' href='$FBF_insert?id=$unique_id'><u>FBF</u></a>";
				   					}
				   					else
				   					{
				   						$str="<a style='color:blue;' href='$form_url?id=$unique_id'><u>$unique_id</u></a>";
				   					}
				   				}
								$table .= "<tr>
												<td>".$str."</td>
												<td>".$call_id."</td>
												<td>".$agent_id."</td>
												<td>".$agent_name."</td>
												<td>".$call_date_time."</td>
												<td>".$incident_id."</td>
												<td>".$issue_typ."</td>
                          						<td>".$queue_name."</td>
                          						<td>".$part_location."</td>
                          						<td>".$evaluator."</td>
                     						</tr>";
				   			}
				   		}
				   		else{
				   			$table .= "<tr ><td colspan='10' align='center'>No Data Found</td></tr>";
				   		}
			$table .= '</table>';
			return  $table;
    	}
    }

    public function BlankForm(){
    	$data['title']		=	'QA-Info | BlankForm';
    	$data['headerName'] = 	"BlankForm";
    	$data['agent']		=	DB::select("select agent_id from agent where status = 'ACTIVE'");
    	return view('Analyst.blankform',$data);
    }

    public function blankFrm(Request $request){
    	return $request->all();
    }

    public function agentData(Request $request){
    	$query="SELECT `vendor`,`lob`,`location`,`campaign`,`agent_name`,`sup_name` FROM agent WHERE agent_id='".$request->agent_id."'";
    	$resultformname = DB::select($query);
    	return (isset($resultformname)?json_encode($resultformname[0]):'');
    }


    public function getformNamebyheirarchy($campaign,$vendor,$location,$lob,$callORmail)
	{
		if($callORmail=='Call' || $callORmail=='call')
		{
			$code=1;
		}else{
			$code=2;
		}
		//DB::enableQueryLog();
		$query = "SELECT `form_name` from `hierarchy` where `campaign` = '$campaign' and `vendor`='$vendor' and `location` = '$location' and `lob` = '$lob'and `code`='$code'";
		$resultformname = DB::select($query);
		//$query = DB::getQueryLog();
		//$query = end($query);
		//print_r($query);
		return $resultformname[0]->form_name;
	}

	public function getinsertformURL($form_name,$version,$unique_id)
	{
		if($form_name=='SO-Call')
		{
			$form_name=$this->getSOformbyUniqueId($unique_id);
		}
		$query = "SELECT * from fk_formFBF where unique_id='$unique_id'";
		$resultformname = DB::select($query);
		$form_insert_url='';
		if(!empty($resultformname)){
			$form_insert_url=$resultformname[0]->insert_url;
		}
		return $form_insert_url;
	}

	public function getviewformURL($form_name,$version,$unique_id)
	{
		if($form_name=='SO-Call')
		{
			$form_name=$this->getSOformbyUniqueId($unique_id);
		}
		$query = "SELECT view_url from form_info WHERE form_name='$form_name' AND form_version='$version'";
		$resultformname = DB::select($query);
		$form_view_url='';
		if(!empty($resultformname)){
			$form_view_url=$resultformname[0]->view_url;
		}
		return $form_view_url;
	}

	public function getauditformURL($form_name,$version,$unique_id)
	{
		if($form_name=='SO-Call')
		{
			$form_name=$this->getSOformbyUniqueId($unique_id);
		}
		$query = "SELECT audit_url from form_info where form_name='$form_name' and form_version='$version'";
		$resultformname = DB::select($query);
		$form_audit_url='';
		if(!empty($resultformname)){
			$form_audit_url=$resultformname[0]->audit_url;
		}
		return $form_audit_url;
	}

	public function getSOformbyUniqueId($unique_id)
	{
		/* echo "unique_id---".$unique_id;
		die; */
		$form_name='';
		$where = ['unique_id'=>$unique_id];
		$query = "SELECT * from fk_formFBF where unique_id='$unique_id'";
		$resultformname = DB::select($query);
		if(count($resultformname)>0)
		{
			$form_name='FBF-Call';
		}
		$query1 = "SELECT * from fk_formFBFAEG where unique_id='$unique_id'";
		$resultformname1 = DB::select($query1);
		if(count($resultformname1)>0)
		{
			$form_name='FBFAEG-Call';
		}
		$query2 = "SELECT * from fk_formNFBF where unique_id='$unique_id'";
		$resultformname2 = DB::select($query2);
		if(count($resultformname2)>0)
		{
			$form_name='NFBF-Call';
		}
		return $form_name;
	}

	public function getMailTable($form_name)
	{
		$tbl_name = "";
		if($form_name == 'CT-Mail')
		{
			$tbl_name 	=	'fk_form_mail';
		}
		if($form_name=='L1-Mail')
		{
			$tbl_name 	=	'fk_form_mail_L1';
		}
		else if($form_name=='L2-Mail')
		{
			$tbl_name 	=	'fk_form_mail_L2';
		}else if($form_name=='L2CVT-Mail')
		{
			$tbl_name 	=	'fk_form_mail_L2CVT';
		}else if($form_name=='L2SS-Mail')
		{
			$tbl_name 	=	'fk_form_mail_L2SS';
		}else if($form_name=='L2ESC-MAIL')
		{
			$tbl_name 	=	'fkformL2ESC';
		}
		return $tbl_name;
	}

	public function getCallTable($form_name)
	{
		$tbl_name="";
		if($form_name=='CT-Call')
		{
			$tbl_name='fk_form';
		}
		if($form_name=='SS-Call')
		{
			$tbl_name='ss_call';
		}
		if($form_name=='L1-Call')
		{
			$tbl_name='fk_formL1';
		}
		else if($form_name=='L2-Call')
		{
			$tbl_name='fk_formL2';
		}
		else if($form_name=='ESC-Call')
		{
		$tbl_name='fk_formESC';
		}
		elseif ($form_name=='SO-Call') {
			$tbl_name='SO-Call';
		}
		elseif ($form_name=='FBF-Call') {
			$tbl_name='fk_formFBF';
		}
		elseif ($form_name=='FBFAEG-Call') {
			$tbl_name='fk_formFBFAEG';
		}
		
		elseif ($form_name=='NFBF-Call') {
			$tbl_name='fk_formNFBF';
		}
		elseif ($form_name=='RE-Call') {
			$tbl_name='fk_formRE';
		}
		elseif ($form_name=='Tele-Call') {
			$tbl_name='fk_formTele';
		}
		elseif ($form_name=='QC-Call') {
			$tbl_name='qc_call';
		}
		return $tbl_name;
	}
}