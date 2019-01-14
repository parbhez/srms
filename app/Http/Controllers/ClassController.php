<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
class ClassController extends Controller
{
    public function addClass()
    {
    	return view('class.addClass');
    }
     public function saveClass(Request $request)
    {
    	// return $request->all();
    	// exit();
    	DB::table('tbl_class')
    			->insertGetId([
    				'class_name' => $request->class_name,
    				'class_section' => $request->section_name
    			]);
    	Session::put('message','Class Created Successfully');
    	return redirect('/addClass');		

    }
    public function viewClass()
    {
    	$allClass = DB::table('tbl_class')->get();
    	// echo '<pre>';
    	// print_r($allClasses);
    	return view('class.viewClass',compact('allClass'));
    }

    
}
