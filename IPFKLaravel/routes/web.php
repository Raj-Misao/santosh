<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return redirect(route('login'));
});
Route::get('/register', function () {
    //return view('welcome');
    return redirect(route('login'));
});

//Route::get('/upload','excelUploadController@index')->name('upload');
//Route::post('/uploadcsv','excelUploadController@UploadCsv')->name('uploadcsv');
Route::get('/locked','UserController@LockedScreen')->name('locked');
Route::get('/notLocked','UserController@notLocked')->name('notLocked');
Route::post('/unlocked','UserController@unLockedScreen')->name('unlocked');
// Route::get('/preUrl','UserController@preUrl')->name('preUrl');
Route::get('/resetPassword/{id}','UserController@resetPassword')->name('resetPassword'); // default password is 123456


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {
    	if(Auth::user()->logged_first_time == 1)
    		return redirect()->route('Password');
        if(Auth::user()->ugroup=='A')
            return redirect()->route('Admin');
        elseif(Auth::user()->ugroup=='SIA')
            return redirect()->route('Supervisor');
        elseif(Auth::user()->ugroup=='SOP')
            return redirect()->route('SupervisorOps');
        elseif(Auth::user()->ugroup=='IA')
            return redirect()->route('Analyst');
        else
            return redirect()->route('Professional');
    });
    // change password
    	Route::get('/Password','UserController@Password')->name('Password');
    	Route::post('/changePassword','UserController@changePassword')->name('changePassword');
    // End change password

	// Change Profile
    	Route::get('/profile','UserController@profile')->name('upload');
		Route::post('/updateProfile','UserController@updateProfile')->name('updateProfile');
	// End Change Profile    	
    // Professional Route  Role Code Client_p
    	Route::get('/professional', 'ProfessionalController@index')->name('Professional')->middleware(IsProfessional::class);
    // End Professional Route
	
	// Supervisor Route    Role Code SIA	
		Route::get('/supervisor', 'SupervisorController@index')->name('Supervisor')->middleware(IsSupervisorOps::class);

		Route::get('/release_data', 'SupervisorController@release_data')->name('release_data')->middleware(IsSupervisorOps::class);

		Route::get('/dump', 'SupervisorController@dump')->name('dump')->middleware(IsSupervisorOps::class);

		Route::get('/call_blk_upload', 'SupervisorController@call_blk_upload')->name('call_blk_upload')->middleware(IsSupervisorOps::class);

		Route::get('/call_assignment', 'SupervisorController@call_assignment')->name('call_assignment')->middleware(IsSupervisorOps::class);

		Route::get('/call_view', 'SupervisorController@call_view')->name('call_view')->middleware(IsSupervisorOps::class);

		Route::get('/call_view_blank', 'SupervisorController@call_view_blank')->name('call_view_blank')->middleware(IsSupervisorOps::class);

		Route::get('/email_blk_upload', 'SupervisorController@email_blk_upload')->name('email_blk_upload')->middleware(IsSupervisorOps::class);

		Route::get('/email_assignment', 'SupervisorController@email_assignment')->name('email_assignment')->middleware(IsSupervisorOps::class);

		Route::get('/email_view', 'SupervisorController@email_view')->name('email_view')->middleware(IsSupervisorOps::class);

		Route::get('/agent_trending', 'SupervisorController@agent_trending')->name('agent_trending')->middleware(IsSupervisorOps::class);

		Route::get('/category_wise', 'SupervisorController@category_wise')->name('category_wise')->middleware(IsSupervisorOps::class);

		Route::get('/attribute', 'SupervisorController@attribute')->name('attribute')->middleware(IsSupervisorOps::class);

		Route::get('/fatal_report', 'SupervisorController@fatal_report')->name('fatal_report')->middleware(IsSupervisorOps::class);

		Route::get('/overall_analyst_report', 'SupervisorController@overall_analyst_report')->name('overall_analyst_report')->middleware(IsSupervisorOps::class);

		Route::get('/agent_evaluation', 'SupervisorController@agent_evaluation')->name('agent_evaluation')->middleware(IsSupervisorOps::class);

		Route::post('/remove_incident_id', 'SupervisorController@remove_incident_id')->name('remove_incident_id')->middleware(IsSupervisorOps::class);
	// End Supervisor Route
	
	// SupervisorOps Route Role Code SOP
		Route::get('/supervisorOps', 'SupervisorOpsController@index')->name('SupervisorOps')->middleware(IsSupervisorOps::class);
		
	// End SupervisorOps Route
	
	// Analyst Route       Role Code IA
		Route::get('/Evaluator', 'AnalystController@index')->name('Analyst')->middleware(IsAnalyst::class);

		Route::get('/BlankForm', 'AnalystController@BlankForm')->name('BlankForm')->middleware(IsAnalyst::class);

		Route::post('/blankFrm', 'AnalystController@blankFrm')->name('blankFrm')->middleware(IsAnalyst::class);

		Route::post('/agent', 'AnalystController@agentData')->name('agent')->middleware(IsAnalyst::class);

		Route::post('/asearch', 'AnalystController@search')->middleware(IsAnalyst::class);
	// End Analyst Route

	// Admin Route    	    Role Code A
		Route::get('/manager', 'AdminController@index')->name('Admin')->middleware(IsAdmin::class);
		Route::get('/agent_registration', 'AdminController@agentRegistration')->name('agent_registration')->middleware(IsAdmin::class);
		Route::get('/agent_upload', 'AdminController@agentUpload')->name('agent_upload')->middleware(IsAdmin::class);
		Route::get('/remove_unique', 'AdminController@removeUnique')->name('remove_unique')->middleware(IsAdmin::class);
		Route::post('/lob', 'AdminController@getLob')->name('lob')->middleware(IsAdmin::class);
	// End Admin Route    

	Route::get('/commonFrm', 'CommonfrmController@index')->name('commonFrm');
	Route::get('error', function () {
		if(\Session::get('locked') === true)
            return redirect('/locked');
		return view('error');
	})->name('error');
});

