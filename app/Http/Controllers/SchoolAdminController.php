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


    public function schooladminSignin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required|min:8'
		]);
		if (Auth::guard('schadmin')->attempt(['email'=> $request['email'], 'password' => $request['password'] ])){
           $sadmin = Auth::guard('schadmin')->user();
            if(True){
                $admin = Auth::guard('schadmin')->user();
                return redirect(url($admin->name.'/Staff'));
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
        //loging out for admin
	public function schoolLogout(){
            $admin = Auth::guard('schadmin')->user();
            $var = $admin->name;
            Auth::guard('schadmin')->logout();
            //return redirect()->route('adminSignin');

            return redirect(url($var.'/Admin'));
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
            if(Auth::guard('schadmin')->check()){
                $admin = Auth::guard('schadmin')->user();
                if ($SchoolName == $admin->name) {
                  return redirect(url($admin->name.'/Staff'));
                }
                else{
                    return view('School.welcome');
                }
            }
            else{
                return view('School.welcome');
            }
        }
        else{
            echo "the school is not registered";
        }
    }
};
