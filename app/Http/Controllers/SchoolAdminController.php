<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use Auth;
use App\http\Requests;
use Image;
use file;

class SchoolAdminController extends Controller
{
    //
    

    public function schooladminSignin(Request $request, $schoolname)
	{
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required|min:8'
		]);
		if (Auth::guard('schadmin')->attempt(['email'=> $request['email'], 'password' => $request['password'] ])){
            $sadmin = Auth::guard('schadmin')->user();
            if($sadmin->name == $schoolname){
               echo "hi";
               // return redirect(url('Staff'));
            }
            else{
                return redirect()->back()->withErrors('Access denied');
            }
		}
		else{
		    return redirect()->back()->withErrors('Either the email or the password is not correct');
        }

    }
    //for the above redirect
    //logout 
	public function schoolLogout(){
        if(Auth::guard('schadmin')->check())
        {
            Auth::guard('schadmin')->logout();
            return redirect()->route('adminSignin');
        }
        else
        {
        return redirect()->back();
        }
    }



    public function index($SchoolName){
            $schools = School::all();
            $count = 0;
        foreach ($schools as $school) {
            if ($school->name == $SchoolName){
                $count++;
            }
        }
        if($count){
                return view('School.welcome');
        }
        else{
            echo "the school is not registered";
        }
    }
};