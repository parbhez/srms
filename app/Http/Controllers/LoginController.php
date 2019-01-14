<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use Auth;

class LoginController extends Controller
{
    public function login()
    {
    	return view('login');
    }
    public function Registration()
    {
    	return view('reg');
    }
    public function saveUser(Request $request)
    {
    	//return $request->all();
    	DB::table('users')
    		->insert([
    			'full_name' => $request->full_name,
    			'user_name' => $request->user_name,
    			'email' => $request->email,
    			'address' => $request->address,
    			'contact' => $request->contact,
    			'password' => bcrypt($request->password),
				'remember_token' => $request->_token
    		]);
    	return redirect('login');		
    }
    public function checkLogin(Request $request)
    {
    	// return $request->all();
        $credentials = [
    		'email' => $request->email,
    		'password' => $request->password,
    	];
    	if(Auth::attempt($credentials)){
            
    		return redirect()->intended('dashboard');
    	}
    		Session::flash('message','Unsucessfull.');
            return redirect()->back();
    	//return 'Unsuccessfull';

    }
    
}
