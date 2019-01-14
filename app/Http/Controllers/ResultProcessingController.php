<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
class ResultProcessingController extends Controller
{
    public function addResult()
    {
      $allclass = DB::table('tbl_class')->get();
    	$allsession = DB::table('tbl_session')->get();
    	return view('result.addResult',compact('allclass','allsession'));
    }

    public function getClassWiseExam($classId = null)
    {
        return DB::table('tbl_exam')
            ->where('class_id',$classId)
            ->get();
    }

    public function getSubjectName($classId = null)
    {
        return DB::table('tbl_subject')
        ->where('class_id',$classId)
        ->get();
    }

    public function getStudent($classId=null,$subNameid = null){
        return DB::table('tbl_student')
        ->join('tbl_class','tbl_student.class_id','=','tbl_class.class_id')
        ->join('tbl_subject','tbl_class.class_id','=','tbl_subject.class_id')
        ->join('tbl_session','tbl_session.session_id','=','tbl_student.session_id')
        ->where('tbl_student.class_id',$classId)
        ->where('tbl_subject.subject_id',$subNameid)
        ->get([
            'tbl_student.*',
            'tbl_subject.subject_id',
            'tbl_subject.subject_name',
            'tbl_subject.subjective',
            'tbl_subject.objective',
            'tbl_subject.practical',
        ]);
    }

    public function saveMarksEntry(Request $request)
    {
        // echo '<pre>';
        // return $request->all();
        // exit();
        foreach ($request->subjective as $key=>$value) {
           $insertMarksId = DB::table('tbl_markantry')
                ->insertGetId([
                    'student_id' => $key,
                    'class_id' => $request->class_id,
                    'exam_id' => $request->exam_id,
                    'subject_id' => $request->subject_id,
                    'session_id' => $request->session_id,
                    'written_marks' => $value,
                    'mcq_marks' => $request['objective'][$key],
                    'practical_marks' => $request['practical'][$key],
                    'total_marks' => ($value+$request['objective'][$key]+$request['practical'][$key]),
                ]);
             if ($insertMarksId) {
                    $totalMarks = ($value+$request['objective'][$key]+$request['practical'][$key]);
                    // if ($totalMarks > 100) {
                    //     $totalMarks = 100;
                    // }
                    $gradeLetter = "";
                    $gpa = "0.00";
                    if ($totalMarks >= 80 && $totalMarks <=100) {
                        $gradeLetter = "A+";
                        $gpa = "5.00";
                    }elseif ($totalMarks >= 70 && $totalMarks < 80) {
                         $gradeLetter = "A";
                        $gpa = "4.00";
                    }elseif ($totalMarks >= 60 && $totalMarks < 70) {
                         $gradeLetter = "A-";
                        $gpa = "3.50";
                    }elseif ($totalMarks >= 50 && $totalMarks < 60) {
                         $gradeLetter = "B";
                        $gpa = "3.00";
                    }elseif ($totalMarks >= 40 && $totalMarks < 50) {
                         $gradeLetter = "C";
                        $gpa = "2.00";
                    }elseif ($totalMarks >= 33 && $totalMarks < 40) {
                         $gradeLetter = "D";
                        $gpa = "1.00";
                    }else{
                        $gradeLetter = "F";
                        $gpa = "0.00";
                    }
                   $grade =  DB::table('tbl_markantry')
                        ->where('marks_id',$insertMarksId)
                        ->update([
                            'total_marks' => $totalMarks,
                            'grade' => $gradeLetter,
                            'gpa' => $gpa
                        ]);
                } 
        }
        Session::flash('message','Marks Antry Successfully');
        return redirect('/addResult');
    }
    public function classWiseResultPublished()
    {
        $classWiseResult = DB::table('tbl_class')->get();
        $sessions = DB::table('tbl_session')->get();
         return view('result.resultPublished',compact('classWiseResult','sessions'));   
    }
    public function getClasswiseExamName($classId=null){
        return DB::table('tbl_exam')
                  ->where('class_id',$classId)  
                  ->get();
    }

  
    public function resultPublished(Request $request)
    {
       // return $request->all();
       // exit();
       $studentSubjectsWiseMark=DB::table('tbl_markantry')
       ->where('class_id',$request->class_id)
       ->where('exam_id',$request->exam_id)
       ->where('session_id',$request->session_id)
       ->get();
        $subjectCount = DB::table('tbl_subject')
            ->where('class_id',$request->class_id)
            ->count();
   
       $finalArray=[];
       
       $meritList = [];
       foreach ($studentSubjectsWiseMark as $key=>$marks) {
           $finalArray[$marks->student_id][]=$marks;
       }
       foreach ($finalArray as $key=>$values) {
            $totalMarks = 0;
            $totalGpa = 0;
        foreach ($values as $value) {
            $totalMarks += $value->total_marks;  
            $totalGpa += $value->gpa;
            $data = [];
            $data['student_id'] = $value->student_id;
            $data['class_id'] = $value->class_id;
            $data['exam_id'] = $value->exam_id;
            $data['session_id'] = $value->session_id;
            $data['total_marks'] = $totalMarks;
            $data['subject_id'] = $subjectCount;
            $data['gpa'] = $totalGpa;
            $data['final_gpa'] = $data['gpa']/$data['subject_id'];
            $data['final_grade'] = ""; 
             if ($data['final_gpa'] ==5.00) {
                $data['final_grade'] = "A+" ;   
                }elseif ($data['final_gpa'] >=4.00) {
                    $data['final_grade'] = "A" ;
                }elseif ($data['final_gpa'] >=3.50) {
                    $data['final_grade'] = "A-" ;
                }elseif ($data['final_gpa'] >=3.00) {
                    $data['final_grade'] = "B" ;
                }elseif ($data['final_gpa'] >=2.00) {
                    $data['final_grade'] = "C" ;
                }elseif ($data['final_gpa'] >=1.00) {
                    $data['final_grade'] = "D" ;
                }else {
                    $data['final_grade'] = "F" ;
                }   
            
            $meritList[$value->student_id] = $totalMarks;
           }

          DB::table('tbl_class_wise_result')
                ->insert([
                    'student_id' => $data['student_id'],
                    'class_id' => $data['class_id'],
                    'exam_id' => $data['exam_id'],
                    'session_id' => $data['session_id'],
                    'final_marks' => $data['total_marks'],
                    'final_gpa' => $data['final_gpa'],
                    'final_grade' => $data['final_grade']
                ]);

       }

       arsort($meritList);
       // print "<pre>";
       // print_r($meritList);
       // exit;
       $i=1;
       $replaceArray = ['1st','2nd','3rd','4th','5th'];
       $searchArray = [1,2,3,4,5];
       foreach ($meritList as $key=>$merit) {
           $position = str_replace($searchArray,$replaceArray,$i);
           DB::table('tbl_class_wise_result')
                ->where('student_id',$key)
                ->update([
                    'merit_list' => $i,
                    'position' => $position
                ]);
         $i++;       

       }
       Session::flash('message','Result published successfully');   
        return redirect('/classWiseResultPublished');
    }
    public function getExamName($classId=null)
    {
       return DB::table('tbl_exam')
            ->where('class_id',$classId)
            ->get();
    }
    public function viewResult()
    {
        $allclass = DB::table('tbl_class')->get();
          return view('result.viewResult',compact('allclass'));  
    }
    public function classWiseResult($classId=null,$examId=null)
    {
         return DB::table('tbl_class_wise_result')
            ->join('tbl_student','tbl_student.student_id','=','tbl_class_wise_result.student_id')
            ->join('tbl_session','tbl_session.session_id','=','tbl_student.session_id')
            ->join('tbl_class','tbl_class.class_id','=','tbl_class_wise_result.class_id')
            ->join('tbl_exam','tbl_exam.exam_id','=','tbl_class_wise_result.exam_id')
            ->where('tbl_class_wise_result.class_id',$classId)
            ->where('tbl_class_wise_result.exam_id',$examId)
            ->get([
                'tbl_class_wise_result.*',
                'tbl_student.student_id',
                'tbl_student.Student_full_name',
                'tbl_student.student_roll_number',
                'tbl_student.session_id',
                'tbl_session.session_name',
                'tbl_class.class_name',
                'tbl_class.class_section',
                'tbl_exam.exam_name'
            ]);
         // echo '<pre>';
         // print_r($finalResult);
         // exit();
         //return view('result.viewResult',compact('allclass'));  
    }

    public function indiviualResultCheck()
    {
      $allclass = DB::table('tbl_class')
        ->get();
      $allsession = DB::table('tbl_session')
        ->get();  
        return view('result.indiviualResultCheck',compact('allclass','allsession'));
    }

    public function stdMarksSheet($classNameid=null)
    {
      return DB::table('tbl_exam')
        ->where('class_id',$classNameid)
        ->get();
     }

    public function viewProgressReport(Request $request)
    {
      // return $request->all();
      // exit();
     $students= DB::table('tbl_student')
        ->join('tbl_class','tbl_class.class_id','=','tbl_student.class_id')
        ->join('tbl_exam','tbl_exam.class_id','=','tbl_class.class_id')
        ->join('tbl_session','tbl_session.session_id','=','tbl_student.session_id')
        ->where('tbl_student.student_id',$request->student_id)
        ->where('tbl_session.session_id',$request->session_id)
        ->first([
          'tbl_student.*',
          'tbl_exam.exam_name',
          'tbl_class.class_name',
          'tbl_class.class_section',
          'tbl_session.session_name',
        ]);
        if (!$students) {
          Session::flash('message',"Opps! Students Result not found");
          return redirect()->back();
        }
       // echo '<pre>';
       //    print_r($students);
       //    exit(); 

       $results = DB::table('tbl_markantry')
           ->join('tbl_student','tbl_student.student_id','=','tbl_markantry.student_id')
           ->join('tbl_session','tbl_session.session_id','=','tbl_student.session_id')
          ->join('tbl_class','tbl_class.class_id','=','tbl_markantry.class_id')
          ->join('tbl_exam','tbl_exam.exam_id','=','tbl_markantry.exam_id')
           ->join('tbl_class_wise_result','tbl_class_wise_result.student_id','=','tbl_markantry.student_id')
          ->join('tbl_subject','tbl_subject.subject_id','=','tbl_markantry.subject_id')
          ->where('tbl_markantry.class_id',$request->class_id)
          ->where('tbl_markantry.exam_id',$request->exam_id)
          ->where('tbl_markantry.student_id',$request->student_id)
          ->where('tbl_session.session_id',$request->session_id)
          ->get([
            'tbl_markantry.*',
            'tbl_class.*',
            'tbl_exam.*',
            'tbl_class_wise_result.*',
            'tbl_student.*',
            'tbl_subject.*',
            'tbl_session.session_name'
          ]);
          // echo '<pre>';
          // print_r($results);
          // exit();
         $finalMarks = DB::table('tbl_class_wise_result')
              ->join('tbl_class','tbl_class.class_id','=','tbl_class_wise_result.class_id')
              ->join('tbl_exam','tbl_exam.exam_id','=','tbl_class_wise_result.exam_id')
              ->join('tbl_student','tbl_student.student_id','=','tbl_class_wise_result.student_id')
              ->join('tbl_session','tbl_session.session_id','=','tbl_student.session_id')
              ->where('tbl_session.session_id',$request->session_id)
              ->where('tbl_class_wise_result.student_id',$request->student_id)
              ->where('tbl_class.class_id',$request->class_id)
              ->where('tbl_exam.exam_id',$request->exam_id)
              ->first([
                'tbl_class_wise_result.*',
                'tbl_session.session_name'
              ]);
          // echo '<pre>';
          // print_r($finalMarks);
          // exit();
          return view('result.viewProgressReport',compact('results','students','finalMarks'));
    }

   
}
