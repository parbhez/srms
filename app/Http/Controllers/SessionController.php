<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
class SessionController extends Controller
{

public function addSession()
{
	return view('session.addSession');
}

public function saveSession(Request $request)
{
	//return $request->all();
		DB::table('tbl_session')
			->insertGetId([
				'session_name' => $request->session_name,
				'session_start_date' => $request->session_start_date,
				'session_end_date' => $request->session_end_date
			]);
		Session::flash('message','Session add Successfully');
		return redirect('/addSession');	

}

	public function viewSession()
	{
		$sessions = DB::table('tbl_session')->get();
		// echo '<pre>';
		// print_r($sessions);
		// exit();
		return view('session.viewSession',compact('sessions'));
	}

}