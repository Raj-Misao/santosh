<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Hash;

use DB;

class UserController extends Controller
{
    public function Password(){
    	return view('user.changepassword');
    }

    public function changePassword(Request $request){
     	$this->validate($request, [
            'old_password' 	=> 'required|string',
            'password'  	=> 'required|string|min:6|confirmed',
        ],[ 
            'old_password.required' => 'Please Enter Old Password.',
            'password.required' 	=> 'Please Enter New Password.',
        ]);
        $old_pwd 	=	$request->old_password;
        $pwd 		=	$request->password;
        $id			=	Auth::user()->empid;
        if (Hash::check($old_pwd, Auth::user()->password)) {
        	if (Hash::check($pwd, Auth::user()->password)) {
        		return Redirect::to('/Password')->with('message', 'Old Password Cann\'t be same');
        	}
        	else{
        		$ud =  DB::table('user_info')->where('empid','=',$id)->update(['password'=> bcrypt($pwd),'logged_first_time'=>2]); 
        		if($ud){
        			Auth::logout();
        			return Redirect::to('/login')->with('message', 'Password Change Succesfully!');
       			}
       			else{
       				return Redirect::to('/Password')->with('message', 'Some Error Please Try Again!');		
       			}
        	}
		}else{
    		return Redirect::to('/Password')->with('message', 'Old Password Mismatch');
		}
    }

    public function profile(){
    	return view('user.profile');
    }

    public function updateProfile(Request $request){
    	$name 	= 	$request->name;
    	$email 	= 	isset($request->email)?$request->email:'NULL';
    	$id		=	Auth::user()->empid;
    	$imageName = '';
    	if(isset($request->pic)){
    		$imageName = time().'.'.request()->pic->getClientOriginalExtension();
    		$filepath = request()->pic->move(public_path('images'), $imageName);
    	}
    	$imageName = !empty($imageName)? $imageName : Auth::user()->profile_img;
    	$up = DB::table('user_info')->where('empid','=',$id)->update(['name'=> $name,'mailid'=>$email,'profile_img'=>$imageName]); 
    	if($up)
	    	return Redirect::back()->with('success','profile Update Succesfully');
    	else
    		return Redirect::back()->with('error','Some Error Please Try Again!');
    }

    public function resetPassword($id){
     	$pwd 	=	'123456';
        $ud 	=  	DB::table('user_info')->where('empid','=',$id)->update(['password'=> bcrypt($pwd),'logged_first_time'=>1]); 
        return Redirect::to('/login')->with('message', 'Password Change Succesfully!');
    }

    public function LockedScreen(){
        if(Auth::check()){
            //session(['link' => url()->previous()]);
            session(['link' => url()->previous()]);
            \Session::put('locked', true);
            return view('user.locked');
        }
        return redirect('/login');
    }

    public function unLockedScreen(Request $request)
    {
    	$this->validate($request, [
            'password'  => 'required|string|min:6',
        ],[ 
            'password.required' => 'Please Enter Password.',
        ]);
    	// if user in not logged in 
        if(!\Auth::check())
            return redirect('/login');

        $password = $request->password;
        //$preUrl = $request->preUrl;
        if(\Hash::check($password,\Auth::user()->password)){
            \Session::forget('locked');
            // echo session('link');die;
            return redirect()->intended();
            //return redirect(session('link'));
        }
        else{
        	return Redirect::to('/locked')->with('message', 'Password Mismatch!');
        }
    }

    public function notLocked(){
        \Session::forget('locked');
    	\Session::forget('link');
    	Auth::logout();
        return Redirect::to('/login');
    }

    public function preUrl(Request $request){
        if($request->count == 1){
            echo $this->preUrl = $request->url;
            session(['link' => $request->url]);
        }
    }
}
