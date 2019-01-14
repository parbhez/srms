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
    return view('welcome');
});

Route::get('/dashboard', function () {
	
    return view('/dashboard');
});

//Create Class routes goes to here..........
Route::get('/login','LoginController@login');
Route::get('/registration','LoginController@Registration');
Route::post('/saveUser','LoginController@saveUser');
Route::post('/userLogin',
	[
		'as' => 'userLogin.post',
		'uses'=>'LoginController@checkLogin'
	]);



	//add Class routes goes to here..........
	Route::get('/addClass','ClassController@addClass');
	Route::post('/saveClass','ClassController@saveClass');
	Route::get('/viewClass','ClassController@viewClass');
	// Route::get('test', function(){
	// 	Auth::logout();
	// });


	//Create Subject routes goes to here...........
	Route::get('/addSubject',[
		'as' => '/addSubject',
		'uses'=>'SubjectController@addSubject'
		]);
	Route::post('/saveSubject','SubjectController@saveSubject');
	Route::get('/viewSubject','SubjectController@viewSubject');
	Route::get('/addSubjectcombination','SubjectController@addSubjectcombination');
	Route::post('/saveSubjectcombination','SubjectController@saveSubjectcombination');
	Route::get('/viewSubjectcombination','SubjectController@viewSubjectcombination');
	Route::get('/inactiveStatus/{id}','SubjectController@inactiveStatus');
	Route::get('/activeStatus/{id}','SubjectController@activeStatus');

	//add Exam routes goes to here......
	Route::get('/addExam','ExamController@addExam');
	Route::post('/saveExam','ExamController@saveExam');
	Route::get('/viewExam','ExamController@viewExam');
	Route::get('/inactiveStatus/{id}','ExamController@inactiveStatus');
	Route::get('/activeStatus/{id}','ExamController@activeStatus');

	//Session routes goes to here...........
	Route::get('addSession','SessionController@addSession');
	Route::post('saveSession','SessionController@saveSession');
	Route::get('viewSession','SessionController@viewSession');


	//ClassSetup routes goes to here...........
	Route::get('classSetup','ClassSetUpController@classSetup');
	Route::post('saveClassSetup','ClassSetUpController@saveClassSetup');
	Route::get('viewClassSetup','ClassSetUpController@viewClassSetup');

	//Create Student routes goes to here...........
	Route::get('/addStudent','StudentController@addStudent');
	Route::post('/saveStudent','StudentController@saveStudent');
	Route::get('/viewStudent','StudentController@viewStudent');
	Route::get('/inactiveStatus/{id}','StudentController@inactiveStatus');
	Route::get('/activeStatus/{id}','StudentController@activeStatus');

	//Create Result route goes to here..........
	Route::get('/addResult','ResultProcessingController@addResult');
	Route::get('showClassWiseStudent','ResultProcessingController@showClassWiseStudent');

Route::get('getClassWiseExam/{classId}',[
		'as' => 'getClassWiseExam',
		'uses' => 'ResultProcessingController@getClassWiseExam'
	]);
Route::get('getClassWiseSubjectName/{classId}',[
		'as' => 'getClassWiseSubjectName',
		'uses' => 'ResultProcessingController@getSubjectName'
	]);
Route::get('getClassNameWiseStudent/{classId}/{subjectId}',[
		'as' => 'getClassNameWiseStudent',
		'uses' => 'ResultProcessingController@getStudent'
	]);
Route::post('saveMarksEntry',[
		'as' => 'saveMarksEntry',
		'uses' => 'ResultProcessingController@saveMarksEntry'
	]);
Route::get('/classWiseResultPublished',
	[	'as' => 'classWiseResultPublished',
		'uses' => 'ResultProcessingController@classWiseResultPublished'
	]);

Route::get('/getClasswiseExamName/{classId}',
	[
		'as' => 'getClasswiseExamName',
		'uses' => 'ResultProcessingController@getClasswiseExamName'
	]);
Route::post('/resultPublished','ResultProcessingController@resultPublished');
Route::get('/viewResult','ResultProcessingController@viewResult');

Route::get('/getExamName/{classId}',
	[
		'as' => 'getExamName',
		'uses' => 'ResultProcessingController@getExamName'
	]);

Route::get('/classWiseResult/{classId}/{examId}',
	[
		'as' => 'classWiseResult',
		'uses' => 'ResultProcessingController@classWiseResult'
	]);





//indiviual result check................
Route::get('/indiviualResultCheck',
	[
		'as' => 'indiviualResultCheck',
		'uses' => 'ResultProcessingController@indiviualResultCheck'
	]);

Route::get('stdMarksSheet/{classNameid}',
	[
		'as' => 'stdMarksSheet',
		'uses' => 'ResultProcessingController@stdMarksSheet'
	]);

Route::post('viewProgressReport',
	[
		'as' => 'viewProgressReport',
		'uses' => 'ResultProcessingController@viewProgressReport'
	]);