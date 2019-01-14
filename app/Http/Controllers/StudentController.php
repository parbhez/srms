<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
class StudentController extends Controller
{
    public function addStudent()
    {
        $allclass= DB::table('tbl_class')->get();
    	$allsession= DB::table('tbl_session')->get();
    	return view('student.addStudent',compact('allclass','allsession'));
    }

    public function saveStudent(Request $request)
    {	
    	//return $request->all();
    	DB::table('tbl_student')
    		->insertGetId([
    			'Student_full_name' => $request->student_full_name,
    			'student_roll_number'  => $request->student_roll_number,
    			'student_reg_number'  => $request->student_reg_number,
    			'session_id'  => $request->session_id,
    			'student_type'  => $request->student_type,
    			'student_email'  => $request->student_email,
    			'student_gender'  => $request->student_gender,
    			'class_id'  => $request->class_id,
    			'section_name'  => $request->class_section,
    			'student_dob'  => $request->student_dob,
    			
    		]);
    	Session::flash('message','Well done! Student Data added Successfully !!!');
    	return redirect('/addStudent');		
    }

    public function viewStudent()
    {
    	$allStudentinfo = DB::table('tbl_student')
    		->join('tbl_class','tbl_class.class_id','=','tbl_student.class_id')
            ->join('tbl_session','tbl_session.session_id','=','tbl_student.session_id')
    		->get([
                'tbl_student.*',
                'tbl_class.class_name',
                'tbl_class.class_section',
                'tbl_session.session_name',
            ]);
    	// echo '<pre>';
    	// print_r($allStudentinfo);	
    	// exit();
    	return view('student.viewStudent',compact('allStudentinfo'));
    	
    }
   
}
