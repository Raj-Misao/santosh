<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Helper;

class SupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo Helper::test();die;
        $data['headerName'] = "dashboard";
        $qrytable = "Select distinct lob from hierarchy where code=1";
        $data['lob']    =   DB::select($qrytable);
        return view('spervisor.index',$data);
    }
    public function release_data(){
        $data['headerName'] = "Release Non Audited Unique IDs";
        return view('spervisor.release_data',$data);
    }
    public function remove_incident_id(Request $request){
        $request->validate([
            'a_file' => 'required|file',
        ]);
        $dbtable = '';
        switch ($request->data_type) {
            case 'calls':
                $dbtable = "fk_call_data";
                break;            
            default:
                $dbtable = "fk_mail_data";
                break;
        }
        $imageName = time().'.'.request()->a_file->getClientOriginalExtension();
        $filepath = request()->a_file->move(public_path('excel/uploads/release_data'), $imageName);
        // Reading file
        $file = fopen($filepath,"r");
        $importData_arr = array();
        $i = 0;
        while (($filedata = fgetcsv($file)) !== FALSE) {
            $num = count($filedata );
            // Skip first row
            if($i == 0){
                $i++;
                continue; 
             }
            for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata[$c];
                $query = "Update ".$dbtable." set evaluator=' ',evaluator_id=' ' where unique_id='".$filedata[$c]."'";
            }
            $i++;
        }
        fclose($file);
        return ['title'=>'success','msg'=>'CSV successfully upload.','data'=>$importData_arr];
    }
    public function dump(){
        $data['headerName'] = "Download Dump";
        return view('spervisor.dump',$data);
    }
    public function call_blk_upload(){
        $data['headerName'] = "Call Bulk Upload";
        return view('spervisor.call_blk_upload',$data);
    }
    public function call_assignment(){
        $data['headerName'] = "Call Bulk Upload";
        return view('spervisor.call_assignment',$data);
    }
    public function call_view(){
        $data['headerName'] = "Call Assignment";
        return view('spervisor.call_view',$data);
    }
    public function call_view_blank(){
        $data['headerName'] = "Call View";
        return view('spervisor.call_view_blank',$data);
    }
    public function email_blk_upload(){
        $data['headerName'] = "email bulk upload";
        return view('spervisor.email_blk_upload',$data);
    }
    public function email_assignment(){
        $data['headerName'] = "Email Assignment";
        return view('spervisor.email_assignment',$data);
    }
    public function email_view(){
        $data['headerName'] = "Email view";
        return view('spervisor.email_view',$data);
    }
    public function agent_trending(){
        $data['headerName'] = "agent trending report";
        return view('spervisor.agent_trending',$data);
    }
    public function category_wise(){
        $data['headerName'] = "category wise report";
        return view('spervisor.category_wise',$data);
    }
    public function attribute(){
        $data['headerName'] = "attribute report";
        return view('spervisor.attribute',$data);
    }
    public function fatal_report(){
        $data['headerName'] = "fatal reprot";
        return view('spervisor.fatal_report',$data);
    }
    public function overall_analyst_report(){
        $data['headerName'] = "ovelall analyst reprot";
        return view('spervisor.overall_analyst_report',$data);
    }
    public function agent_evaluation(){
        $data['headerName'] = "agent evaluation report";
        return view('spervisor.agent_evaluation',$data);
    }

    
}
