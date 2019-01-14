<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
class ClassSetUpController extends Controller
{
	public function classSetup()
	{
		$allSession = DB::table('tbl_session')->get();
		$allclass = DB::table('tbl_class')->get();
		return view('classSetUp.classSetup',compact('allSession','allclass'));
	}
}