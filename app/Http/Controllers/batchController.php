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
            'batch' => 'required|unique:batches',
            'test' => 'required|max:120',
            'section' => 'required|max:120',
            'nosubject' => 'required|max:120',
            'subject1' => 'required|max:120|Alpha',
            'subject2' => 'required|max:120|Alpha',
            'subject3' => 'required|max:120|Alpha',
            'subject4' => 'required|max:120|Alpha',
            'subject5' => 'required|max:120|Alpha',
        ]);
        $subjects = [];
        $value = 0;
        for ($i = 1; $i<=20; $i++){
            if ($request['subject'.$i]) {    
                    array_push($subjects, $request['subject'.$i]);
            }
            else{
                array_push($subjects, 0);
                $value++;
            }

        }
        for ($i = 0; $i<20; $i++){
            if ( preg_match("/^[a-zA-Z]*$/", $subjects[$i])){

            }
            else if ( preg_match("/^[0-9]*$/", $subjects[$i])) {
                
            }
            else{
                return redirect()->back()->withError("Only Alpahbetic Letter are allow as subjects name");
            }

        }  
                
        $coun = array_flip(array_count_values($subjects));
        $sub = sizeof($coun);
        if ($value == 0){
            if ($sub == 1 && $coun[1]){

            }
        }
        else{
            if($sub == 2 && $coun[1]) {

            }
            else{
            return redirect()->back()->withError("Can not use same name for two subjects");
            }
        }

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
        if($subjects[7]){
            $batch->subj8 = $subjects[7];
        }
        if($subjects[8]){
            $batch->subj9 = $subjects[8];
        }
        if($subjects[9]){
            $batch->subj10 = $subjects[9];
        }
        if($subjects[10]){
            $batch->subj11 = $subjects[10];
        }
        if($subjects[11]){
            $batch->subj12 = $subjects[11];
        }
        if($subjects[12]){
            $batch->subj13 = $subjects[12];
        }
        if($subjects[13]){
            $batch->subj14 = $subjects[13];
        }
        if($subjects[14]){
            $batch->subj15 = $subjects[14];
        }
        if($subjects[15]){
            $batch->subj16 = $subjects[15];
        }
        if($subjects[16]){
            $batch->subj17 = $subjects[16];
        }
        if($subjects[17]){
            $batch->subj18 = $subjects[17];
        }
        if($subjects[18]){
            $batch->subj19 = $subjects[18];
        }
        if($subjects[19]){
            $batch->subj20 = $subjects[19];
        }
        $batch->save();
        return redirect(url(Auth::guard('schstaff')->user()->school_name.'/staff/Batch'))->withsuccess('Successfully added ');
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
    // create table by the user  

    public function Tabledelete(Request $request, $SchoolName){
        $id = $request['see'];
        $tabb = table::find($id);
        Schema::dropIfExists($tabb->tablename);
        $ta = table::findOrFail($id);
        $ta->delete();
        return redirect(url(Auth::guard('schstaff')->user()->school_name.'/staff/Batch'))->withsuccesstabledelet('Successfully Deleted Table');  
    }



    public function addtable(Request $request, $SchoolName){ 

        $num = 1; 
        $id = $request['see'];
        $this->ids = $id;
        $tabb = batch::find($this->ids);
        $notest = $tabb->testno;
        $schname = $tabb->school_name;
        $schcode = $tabb->school_code;
        $batch1 = $tabb->batch;

        // run in a loop to add multible able depending on the number of test

        while($num <= $notest){
            $tabname =  $schname.'_'.$schcode.'_'.$batch1.'_'.$num;
            $viewtabs = table::all();
            $count = 1;
            foreach($viewtabs as $viewtab) {
                if ( $tabname == ($viewtab->tablename)  ){
                    $count--;
                }
            }   
            // the if below check if the table exist by checking wheather the model table is empty
            if ($viewtabs->isEmpty()) {                   
                Schema::create(  $tabname, function (Blueprint $table) { 
                    $tabb = batch::find($this->ids);
                    $subject1 = $tabb->subj1;
                    $subject2 = $tabb->subj2;
                    $subject3 = $tabb->subj3;
                    $subject4 = $tabb->subj4;
                    $subject5 = $tabb->subj5;
                    $subject6 = $tabb->subj6;
                    $subject7 = $tabb->subj7;
                    $subject8 = $tabb->subj8;
                    $subject9 = $tabb->subj9;
                    $subject10 = $tabb->subj10;
                    $subject11 = $tabb->subj11;
                    $subject12 = $tabb->subj12;
                    $subject13 = $tabb->subj13;
                    $subject14 = $tabb->subj14;
                    $subject15 = $tabb->subj15;
                    $subject16 = $tabb->subj16;
                    $subject17 = $tabb->subj17;
                    $subject18 = $tabb->subj18;
                    $subject19 = $tabb->subj19;
                    $subject20 = $tabb->subj20;
                    $table->increments('id');
                    $table->string('school_code');
                    $table->string('schoolname');
                    $table->string('firstname');
                    $table->string('lastname');
                    $table->string('studentid');
                    $table->string('section');
                    $table->string($subject1);
                    $table->string($subject2);
                    $table->string($subject3);
                    $table->string($subject4);
                    $table->string($subject5);
                    if($subject6 !== 'none'){
                    $table->string($subject6);
                    }
                    if($subject7 !== 'none'){
                    $table->string($subject7);
                    }
                    if($subject8 !== 'none'){
                    $table->string($subject8);
                    }
                    if($subject9 !== 'none'){
                    $table->string($subject9);
                    }
                    if($subject10 !== 'none'){
                    $table->string($subject10);
                    }
                    if($subject11 !== 'none'){
                    $table->string($subject11);
                    }
                    if($subject12 !== 'none'){
                    $table->string($subject12);
                    }
                    if($subject13 !== 'none'){
                    $table->string($subject13);
                    }
                    if($subject14 !== 'none'){
                    $table->string($subject14);
                    }
                    if($subject15 !== 'none'){
                    $table->string($subject15);
                    }
                    if($subject16 !== 'none'){
                    $table->string($subject16);
                    }
                    if($subject17 !== 'none'){
                    $table->string($subject17);
                    }
                    if($subject18 !== 'none'){
                    $table->string($subject18);
                    }
                    if($subject19 !== 'none'){
                    $table->string($subject19);
                    }
                    if($subject20 !== 'none'){
                    $table->string($subject20);
                    }
            }); 
            $table = new table();
            $table->schoolcode = $schcode;
            $table->schoolname = $schname;
            $table->tablename = $tabname;
            $table->save();
            //add the created table name to an already existing table called table
            }
            else{     
                if($count == 1){
                    Schema::create(  $tabname, function (Blueprint $table) { 
                        $tabb = batch::find($this->ids);
                        $subject1 = $tabb->subj1;
                        $subject2 = $tabb->subj2;
                        $subject3 = $tabb->subj3;
                        $subject4 = $tabb->subj4;
                        $subject5 = $tabb->subj5;
                        $subject6 = $tabb->subj6;
                        $subject7 = $tabb->subj7;
                        $subject8 = $tabb->subj8;
                        $subject9 = $tabb->subj9;
                        $subject10 = $tabb->subj10;
                        $subject11 = $tabb->subj11;
                        $subject12 = $tabb->subj12;
                        $subject13 = $tabb->subj13;
                        $subject14 = $tabb->subj14;
                        $subject15 = $tabb->subj15;
                        $subject16 = $tabb->subj16;
                        $subject17 = $tabb->subj17;
                        $subject18 = $tabb->subj18;
                        $subject19 = $tabb->subj19;
                        $subject20 = $tabb->subj20;
                        $table->increments('id');
                        $table->string('school_code');
                        $table->string('schoolname');
                        $table->string('firstname');
                        $table->string('lastname');
                        $table->string('studentid');
                        $table->string('section');
                        $table->string($subject1);
                        $table->string($subject2);
                        $table->string($subject3);
                        $table->string($subject4);
                        $table->string($subject5);
                        if($subject6 !== 'none'){
                        $table->string($subject6);
                        }
                        if($subject7 !== 'none'){
                        $table->string($subject7);
                        }
                        if($subject8 !== 'none'){
                        $table->string($subject8);
                        }
                        if($subject9 !== 'none'){
                        $table->string($subject9);
                        }
                        if($subject10 !== 'none'){
                        $table->string($subject10);
                        }
                        if($subject11 !== 'none'){
                        $table->string($subject11);
                        }
                        if($subject12 !== 'none'){
                        $table->string($subject12);
                        }
                        if($subject13 !== 'none'){
                        $table->string($subject13);
                        }
                        if($subject14 !== 'none'){
                        $table->string($subject14);
                        }
                        if($subject15 !== 'none'){
                        $table->string($subject15);
                        }
                        if($subject16 !== 'none'){
                        $table->string($subject16);
                        }
                        if($subject17 !== 'none'){
                        $table->string($subject17);
                        }
                        if($subject18 !== 'none'){
                        $table->string($subject18);
                        }
                        if($subject19 !== 'none'){
                        $table->string($subject19);
                        }
                        if($subject20 !== 'none'){
                        $table->string($subject20);
                        }
                    }); 
                    $table = new table();
                    $table->schoolcode = $schcode;
                    $table->schoolname = $schname;
                    $table->tablename = $tabname;
                    $table->save();
                }
                else{
                    return redirect(url(Auth::guard('schstaff')->user()->school_name.'/staff/Batch'))->withsubfailtable('Table already Add');
                }
            }
           $num++;
            }
            return redirect(url(Auth::guard('schstaff')->user()->school_name.'/staff/Batch'))->withsuccesstable('Successfully added Table');    
        }

}
