<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\http\Requests;
use App\Admin;
use Image;
use file;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function adminSignin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required|min:8',
			'pin' => 'required|min:4|max:4'
		]);
		if (Auth::guard('admin')->attempt(['email'=> $request['email'], 'password' => $request['password'], 'pin' => $request['pin'] ])){
            return redirect()->route('viewadmin');
		}

    }
    //for the above redirect
	public function viewadmin(){
        return view ('stnet.home', array('user' => Auth::guard('admin')->user() ) );
    }
    //logout 
	public function Logout(){
		Auth::guard('admin')->logout();
        return redirect()->route('well');
    }
    
    public function index()
    {

        if(Auth::guard('admin')->check()){
            return redirect()->route('viewadmin');
        }
        elseif(Auth::guest()){
            return view('stnet.welcome');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // save the data of the admins to the admins table
        //initialize the Admin class

        //requests
        $avatar = $request->file('avatar');
		$first_name = $request['fname'];
		$last_name = $request['lname'];
		$email = $request['email'];
		$phone = $request['phone'];
        $token = $request['_token'];
		$pin = $request['pin'];
        $password = bcrypt($request['password']);

        //Vallidation 
		$this->validate($request, [
			'fname' => 'required|max:120|Alpha',
			'lname' => 'required|max:120|Alpha',
			'email' => 'email|unique:admin',
			'phone' => 'required|unique:admin|max:9|min:9', 
			'pin' => 'required|max:4|min:4',             
			'password' => 'required|min:8|confirmed',
			'avatar' => 'max:10000',
        ]);
        //adding to database

        $admin = new Admin();
		$admin->firstname = $first_name;
        $admin->lastname = $last_name; 
        
        // adding image to database 
		if ($request-> hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(2000, 2000) ->save(public_path('/uploads/admin/'.$filename));
			if($admin){
				$admin->avatar = 'admin/'.$filename;
			} 
        }
		$admin->email = $email;
        $admin->phone = $phone;
        $admin->user_id = '15876356';
        $adds = Admin::all(); 
        
        foreach($adds as $add){ 
            if (($add->id) < 1 ){
                //$admin->user_id = '15876356';
            }
            else{
                $admin->user_id = ($add->user_id) + '1';
            }
        }	
		$admin->role_id = '1';
		$admin->pin = $pin;
        $admin->password = $password;
        $admin->remember_token = $token;
		Auth::login($admin);
        $admin->save();
        return redirect()->route('viewadmin');
        
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
    //admin signing in 
}
