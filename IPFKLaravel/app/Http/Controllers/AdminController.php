<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	return view('admin.index');
    }
    public function agentRegistration(){
    	return view('admin.agentRegistration');
    }
    public function agentUpload(){
    	return view('admin.agentUpload');
    }
    public function removeUnique(){
    	$data['frm']	=	DB::select("SELECT DISTINCT form_name,form_tbl FROM form_info");
    	return view('admin.removeUnique',$data);
    }
}
