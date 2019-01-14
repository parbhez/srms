<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
class ExamController extends Controller
{
     public function addExam()
    {
    	$allclass = DB::table('tbl_class')->get();
    	return view('exam.addExam',compact('allclass'));
    }
    public function saveExam(Request $request)
    {
    	// return $request->all();
    	// exit();
    	DB::table('tbl_exam')
    		->insertGetId([
    				'class_id' => $request->class_name,
    				'exam_name' => $request->exam_name,
    				'publication_status' => $request->publication_status
    			]);

        Session::put('message','Exam Name Created Successfully');
        return redirect('/addExam');     
    }

    public function viewExam()
    {
    	$allExam = DB::table('tbl_exam')
            ->join('tbl_class','tbl_class.class_id','=','tbl_exam.class_id')
            ->select('tbl_exam.*','tbl_class.*')
            ->get();
            // echo '<pre>';
            // print_r($allExam);
            // exit();
    	return view('exam.viewExam',compact('allExam'));
    }
    public function inactiveStatus($id)
    {
        // echo $id;
        // exit();
        DB::table('tbl_exam')
            ->where('exam_id',$id)
            ->update([
                'publication_status' => 0
            ]);
        Session::put('message','Exam Name Inactive Successfully');
        return redirect('viewExam');    
    }
     public function activeStatus($id)
    {
        // echo $id;
        // exit();
        DB::table('tbl_exam')
            ->where('exam_id',$id)
            ->update([
                'publication_status' => 1
            ]);
        Session::put('message','Exam Name active Successfully');
        return redirect('viewExam');    
    }
}
