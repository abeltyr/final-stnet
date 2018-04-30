<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Staff;
use Auth;
use App\http\Requests;
use Image;
use file;

class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    
    public function schoolstaffSignin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required|min:8'
		]);
		if (Auth::guard('schstaff')->attempt(['email'=> $request['email'], 'password' => $request['password'] ])){
            if(True){
                $admin = Auth::guard('schstaff')->user();
                return redirect(url($admin->school_name.'/Staff'));
                
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
	public function schoolstaffLogout(){
        //loging out for staff
        if(Auth::guard('schstaff')->check())
        {
            Auth::guard('schstaff')->logout();
            return redirect()->route('schoolstaffSignin');
        }
        else
        {
        return redirect()->back();
        }
    } 


    
    public function index()
    { 
        if(Auth::guard('schadmin')->check()){
            return view('school.signup');
        }
        elseif(Auth::guard('schstaff')->check()){
            return view('school.staff.dashboard');
        }
        elseif(Auth::guest()){
            return view('school.staff.welcome');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = $request->file('photo');
		$first_name = $request['fname'];
		$last_name = $request['lname'];
		$email = $request['email'];
		$phone = $request['phone'];
        $token = $request['_token'];
		$password = bcrypt($request['password']);
		$this->validate($request, [
			'fname' => 'required|max:120',
			'lname' => 'required|max:120',
			'email' => 'email|unique:Staffs',
			'phone' => 'required|unique:Staffs|max:9|min:9', 
			'password' => 'required|min:8|confirmed',
			'photo' => 'mimes:jpeg,jpg,png | max:10000',
        ]);
        $scdata= Auth::guard('schadmin')->user();
        $user = new Staff();
		$user->school_name = $scdata->name;
		$user->school_code = $scdata->school_code;
		$user->firstname = $first_name;
		$user->lastname = $last_name; 
		if ($request-> hasFile('photo')){
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
			Image::make($photo)->resize(500, 500) ->save(public_path('/uploads/schools/employ/'.$filename));
			if($user){
				$user->avatar = '/uploads/schools/employ/'.$filename;
			} 
        }
        $adds = Staff::all(); 
        if ($adds->isEmpty()) {
            $user->user_id = $scdata->school_code.'-'.'1';
        } else {
            foreach($adds as $add) {
                $user->user_id = ($add->user_id) + '1';
            }
        }
		$user->email = $email;
		$user->phone = $phone;
        $user->password = $password;
        $user->remember_token = $token;
		$user->save();
		return redirect()->back()->withSuccess('SUCCESSFULY INSERTED');









    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
