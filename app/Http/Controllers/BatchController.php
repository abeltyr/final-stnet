<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\batch;
use App\table;
use App\School;
use Auth;
use App\http\Requests;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($SchoolName)
    {
        //
        $schools = School::all();
        $count = 0;
        foreach ($schools as $school) {
            if ($school->name == $SchoolName){
                $count++;
            }
        }
        if($count){
            if(Auth::guard('schadmin')->check()){
                $tabs = table::all();
                $bats = batch::all();
                return view('school.staff.batch',['tabs'=> $tabs,'bats'=> $bats]);
            }
            elseif(Auth::guard('schstaff')->check()){
                $tabs = table::all();
                $bats = batch::all();
                return view('school.staff.batch',['tabs'=> $tabs,'bats'=> $bats]);
            }
            elseif(Auth::guest()){
                return view('school.staff.welcome');
            }
        }
        else{
            echo "the school is not registered";
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
        // validate the incoming request object
        $this->validate($request, [
            'batch' => 'required',
            'test' => 'required|max:120',
            'section' => 'required|max:120',
            'nosubject' => 'required|max:120',
            'subject1' => 'required|max:120',
            'subject2' => 'required|max:120',
            'subject3' => 'required|max:120',
            'subject4' => 'required|max:120',
            'subject5' => 'required|max:120|',
        ]);
        $subjects[]s = [];
        for ($i = 1; $i<=20; $i++){
            if ($request['subject'.$i]) {
                array_push($subjects[]s, $request['subject'.$i]);
            }

        }
        $subjects[]s = array_unique($subjects[]s);


        //adding the table
        $namesch = Auth::guard('schstaff')->user()->school_name;
        $codesch = Auth::guard('schstaff')->user()->school_code;
        $batch1 = $request['batch'];
        $notest = $request['test'];
        $nosection = $request['section'];
        $batch = new batch();
        $batch->school_name = $namesch;
        $batch->school_code = $codesch ;
        $batch->testno = $notest;
        $batch->no_section = $nosection;
        $batch->batch = $batch1;
        $batch->subj1 = $subjects[0];
        $batch->subj2 = $subjects[1];
        $batch->subj3 = $subjects[2];
        $batch->subj4 = $subjects[3];
        $batch->subj5 = $subjects[4];
        if($subjects[5]){
            $batch->subj6 = $subjects[5];
        }
        if($subjects[6]){
            $batch->subj7 = $subjects[6];
        }
        if($subjects[]8){
            $batch->subj8 = $subjects[]s[]8;
        }
        if($subjects[]9){
            $batch->subj9 = $subjects[]9;
        }
        if($subjects[]10){
            $batch->subj10 = $subjects[]10;
        }
        if($subjects[]11){
            $batch->subj11 = $subjects[]11;
        }
        if($subjects[]12){
            $batch->subj12 = $subjects[]12;
        }
        if($subjects[]13){
            $batch->subj13 = $subjects[]13;
        }
        if($subjects[]14){
            $batch->subj14 = $subjects[]14;
        }
        if($subjects[]15){
            $batch->subj15 = $subjects[]15;
        }
        if($subjects[]16){
            $batch->subj16 = $subjects[]16;
        }
        if($subjects[]17){
            $batch->subj17 = $subjects[]17;
        }
        if($subjects[]18){
            $batch->subj18 = $subjects[]18;
        }
        if($subjects[]19){
            $batch->subj19 = $subjects[]19;
        }
        if($subjects[]20){
            $batch->subj20 = $subjects[]20;
        }

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
