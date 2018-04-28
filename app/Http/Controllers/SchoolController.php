<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\http\Requests;
use Image;
use file;
use Illuminate\Support\Facades\Mail;
use App\Mail\Schooladmin;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show the form for creating a school

        return view('School.school');

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
        //get data from blade
        $logo = $request->file('logo');
        $name = $request['name'];
        $rep = $request['srep'];
        $email = $request['email'];
        $phone = $request['phone'];
        $address = $request['saddress'];
        $nstud = $request['nstud'];
        $owner = $request['sowner'];
        $sub_type = $request['sub_type'];
        //add the data to a local variable to validate it
        $this->validate($request, [
            'name' => 'required|max:120|unique:schools',
            'srep' => 'required|max:120',
            'email' => 'required|email|unique:schools',
            'phone' => 'required|max:9|min:9',
            'phone' => 'unique:schools',
            'saddress' => 'required|max:120',
            'nstud' => 'required|max:120',
            'sowner' => 'required|max:120',
            'sub_type' => 'required | max:120 |  ',
            'logo' => 'mimes:jpeg,jpg,png | max:10000',
        ]);
        // initialize a new School model and save the data to the database
        $school = new School();
        $adds = school::all();
        if ($adds->isEmpty()) {
            $passwo = rand(10000,99999);
            $school->school_code = $passwo.'1';
        } else {
            foreach($adds as $add) {
                $school->school_code = ($add->school_code) + '1';
            }
        }
        $school->name = $name;
        // adding image to database 
		if ($request-> hasFile('logo')){
            $filename = time(). '.' .$logo->getClientOriginalExtension();
            Image::make($logo)->resize(2000,2000)->save( public_path('/uploads/schools/logo/'. $filename ) );
            
			if($school){
				$school->logo = 'schools/logo/'.$filename;
			} 
        }
        $passwo = str_random(8) ;
        $password = $passwo;
        $bypass = bcrypt($passwo);
        $school->representative = $rep;
        $school->email = $email;
        $school->phone = $phone;
        $school->address = $address ;
        $school->password = $passwo ;
        $school->hashed_password = $bypass ;
        $school->password_changed = '1' ;
        $school->no_student = $nstud;
        $school->school_owner = $owner;
        $school->subscibtion = '1';
        $school->subscibtion_type = $sub_type;

        Mail::to($email)->send(new Schooladmin($password));
        $school->save();
        return json_encode($school);

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
