<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class CommonfrmController extends Controller
{
    public function index(){
    	$data['agent']	=	DB::select("select agent_id from agent where status = 'ACTIVE'");
    	return view('layouts.commonFrm',$data);
    }
}
