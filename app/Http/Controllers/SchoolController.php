<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\http\Requests;
use Image;
use file;

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
        //add the data to a local variable to validate it
        $avatar = $request->file('avatar');
        $name = $request['sname'];
        $rep = $request['srep'];
        $email = $request['email'];
        $phone = $request['phone'];
        $address = $request['saddress'];
        $nstud = $request['nstud'];
        $owner = $request['sowner'];
        $sub_type = $request['sub_type'];
        $this->validate($request, [
            'sname' => 'required|max:120',
            'srep' => 'required|max:120',
            'email' => 'required|email|unique:schools',
            'phone' => 'required|max:9|min:9',
            'phone' => 'unique:schools',
            'saddress' => 'required|max:120',
            'nstud' => 'required|max:120',
            'sowner' => 'required|max:120',
            'sub_type' => 'required | max:120 |  ',
            'avatar' => 'mimes:jpeg,jpg,png | max:10000',
        ]);
        // initialize a new School model and save the data to the database

        $school = new School();
        $adds = school::all();
        foreach($adds as $add) {
            if (($add->id) == '') {
                $school->school_code = '21867218';
            } else {
                $school->school_code = ($add->school_code) + '1';
            }
        }
        $school->name = $name;
        $school->representative = $rep;
        $school->email = $email;
        $school->phone = $phone;
        $school->address = $address ;
        $school->no_student = $nstud;
        $school->school_owner = $owner;
        $school->subscibtion = '1';
        $school->subscibtion_type = $sub_type;
        // Add the School logo
        $filename = time(). '.' .$avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300,300)->save( public_path('/uploads/schools/logo'. $filename ) );
        $school ->avatar = $filename;

        $school->save();
        //Auth::login($school);
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
