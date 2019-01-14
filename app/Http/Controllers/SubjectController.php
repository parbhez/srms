<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
class SubjectController extends Controller
{
     public function addSubject()
    {
        $allclass = DB::table('tbl_class')->get();
    	return view('subject.addSubject',compact('allclass'));
    }
    public function saveSubject(Request $request)
    {
    	DB::table('tbl_subject')
    		->insertGetId([
                'class_id' => $request->class_id,
    			'subject_name' => $request->subject_name,
                'subject_code' => $request->subject_code,
                'subjective' => $request->subjective,
                'objective' => $request->objective,
    			'practical' => $request->practical
    		]);
    	Session::flash('message','Subject add Successfully');
    	return redirect()->route('/addSubject');	
    }


    public function viewSubject()
    {
    	$allSubject = DB::table('tbl_subject')
    		->get();
    	return view('subject.viewSubject',compact('allSubject'));		
    }
    
    public function addSubjectcombination()
    {
        $allclass = DB::table('tbl_class')->get();
        $allsubject = DB::table('tbl_subject')->get();
    	return view('subject.addSubjectcombination',compact('allclass','allsubject'));
    }
    public function saveSubjectcombination(Request $request)
    {
    	DB::table('tbl_subject_combination')
    		->insertGetId([
    			'class_id' => $request->class_id,
    			'subject_id' => $request->subject_id,
    		]);
    	Session::flash('message','Well Done! Combination added Successfully');
    	return redirect('/addSubjectcombination');		
    }
    public function viewSubjectcombination()
    {
    	$allSubjectcombination = DB::table('tbl_subject_combination')
    		->join('tbl_class','tbl_class.class_id','=','tbl_subject_combination.class_id')
    		->join('tbl_subject','tbl_subject.subject_id','=','tbl_subject_combination.subject_id')
    		->select('tbl_subject_combination.*','tbl_class.*','tbl_subject.subject_name')
    		->get();
    	// echo '<pre>';
    	// print_r($allSubjectcombination);
    	// exit();
    		return view('subject.viewSubjectcombination',compact('allSubjectcombination'));
    }
    public function inactiveStatus($id)
    {
        //echo $id;
        DB::table('tbl_subject_combination')
            ->where('subject_combination_id',$id)
            ->update([
                'publication_status' => 0
            ]);
        Session::put('message','Well Done! CombinationInfo Inactive Successfully');
        return redirect('/manageSubjectcombination');    
    }
    public function activeStatus($id)
    {
        //echo $id;
        DB::table('tbl_subject_combination')
            ->where('subject_combination_id',$id)
            ->update([
                'publication_status' => 1
            ]);
        Session::put('message','Well Done! CombinationInfo active Successfully');
        return redirect('/manageSubjectcombination');    
    }
}
