<?php

namespace App\Http\Controllers;
use Excel;
use DB;

use Illuminate\Http\Request;

class excelUploadController extends Controller
{
    //
    public function index(){
    	return view('upload');
    }

    public function UploadCsv(Request $request){
    	$request->validate([
            'excel_upload' => 'required|file',
        ]);
        $dbtable = 'user_info';        
        $imageName = time().'.'.request()->excel_upload->getClientOriginalExtension();
        $filepath = request()->excel_upload->move(public_path('excel/uploads/release_data'), $imageName);
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
            }
            $i++;
  
        }
        fclose($file);
        foreach ($importData_arr as $key => $value) {
            	$data = [
        			'name'				=>	$value['0'],
        			'empid'				=>	$value['1'],
        			'user_type'			=>	$value['2'],
        			'ugroup'			=>	$value['3'],
        			'username'			=>	$value['4'],
        			'password'			=>	'$2y$10$c4gJat9x0870xUGAtoQ.FuoF3SRiUY68i4fxTtkEfwSdh2d234YW6',
        			'mailid'			=>	$value['6'],
        			'doj'				=>	$value['7'],
        			'sup'				=>	$value['8'],
        			'sup_id'			=>	$value['9'],
        			'status'			=>	$value['10'],
        			'profile_img'		=>	'599afcea36b94123.png',
        			'created_at'		=>	date('Y-m-d H:i:s'),
        			'updated_at'		=>	date('Y-m-d H:i:s'),
        			'logged_first_time'	=>	'1'
        		];
        		DB::table($dbtable)->insert($data);
        		print_r($data);
            }
        return ['title'=>'success','msg'=>'CSV successfully upload.','data'=>$importData_arr];
    }
}
