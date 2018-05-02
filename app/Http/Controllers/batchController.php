<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\batch;
use App\table;
use Auth;
use App\http\Requests;
use Image;
use file;
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





     
    // create table by the user  

    public function Tabledelete(Request $request, $SchoolName){
        $id = $request['see'];
        $tabb = table::find($id);
        Schema::dropIfExists($tabb->tablename);
        $ta = table::findOrFail($id);
        $ta->delete();
        return redirect(url(Auth::guard('schstaff')->user()->school_name.'/Batchs'))->withsuccesstabledelet('Successfully Deleted Table');  
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
                    return redirect(url(Auth::guard('schstaff')->user()->school_name.'/Batchs'))->withsubfailtable('Table already Add');
                }
            }
           $num++;
            }
            return redirect(url(Auth::guard('schstaff')->user()->school_name.'/Batchs'))->withsuccesstable('Successfully added Table');    
        }










    public function index($SchoolName)
    {
        $tabs = table::all();
        $bats = batch::all();
        return view('school.staff.batch',['tabs'=> $tabs,'bats'=> $bats]);
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
        
		$subject1 = $request['subject1'];
		$subject2 = $request['subject2'];
		$subject3 = $request['subject3'];
		$subject4 = $request['subject4'];
		$subject5 = $request['subject5'];
		$subject6 = $request['subject6'];
		$subject7 = $request['subject7'];
		$subject8 = $request['subject8'];
		$subject9 = $request['subject9'];
        $subject10 = $request['subject10'];
		$subject11 = $request['subject11'];
        $subject12 = $request['subject12'];
        $subject13 = $request['subject13'];
		$subject14 = $request['subject14'];
		$subject15 = $request['subject15'];
        $subject16 = $request['subject16'];
		$subject17 = $request['subject17'];
		$subject18 = $request['subject18'];
        $subject19 = $request['subject19'];
        $subject20 = $request['subject20'];

        //Check if the Subjects are repeated or not

        if($subject1 == $subject2 || $subject1 == $subject3 || $subject1 == $subject4 || $subject1 == $subject5 || $subject1 == $subject6 || $subject1 == $subject7 || $subject1 == $subject8 || $subject1 == $subject9 || $subject1 == $subject10 || $subject1 == $subject11  || $subject1 == $subject12   || $subject1 == $subject13  || $subject1 == $subject14  || $subject1 == $subject15 || $subject1 == $subject16  || $subject1 == $subject17  || $subject1 == $subject18  || $subject1 == $subject19  || $subject1 == $subject20   ){
            return redirect()->back()->withsubfail('Subject 1 can not be add twice');
        }
        if($subject2 == $subject1 || $subject2 == $subject3 || $subject2 == $subject4 || $subject2 == $subject5 || $subject2 == $subject6 || $subject2 == $subject7 || $subject2 == $subject8 || $subject2 == $subject9 || $subject2 == $subject10 || $subject2 == $subject11  || $subject2 == $subject12   || $subject2 == $subject13  || $subject2 == $subject14  || $subject2 == $subject15 || $subject2 == $subject16  || $subject2 == $subject17  || $subject2 == $subject18  || $subject2 == $subject19  || $subject2 == $subject20  ){
            return redirect()->back()->withsubfail('Subject 2 can not be add twice');
        }
        if($subject3 == $subject1 || $subject3 == $subject2 || $subject3 == $subject4 || $subject3 == $subject5 || $subject3 == $subject6 || $subject3 == $subject7 || $subject3 == $subject8 || $subject3 == $subject9 || $subject3 == $subject10 || $subject3 == $subject11  || $subject3 == $subject12   || $subject3 == $subject13  || $subject3 == $subject14  || $subject3 == $subject15 || $subject3 == $subject16  || $subject3 == $subject17  || $subject3 == $subject18  || $subject3 == $subject19  || $subject3 == $subject20  ){
            return redirect()->back()->withsubfail('Subject 3 can not be add twice');
        }
        if($subject4 == $subject1 || $subject4 == $subject3 || $subject4 == $subject2 || $subject4 == $subject5 || $subject4 == $subject6 || $subject4 == $subject7 || $subject4 == $subject8 || $subject4 == $subject9 || $subject4 == $subject10 || $subject4 == $subject11  || $subject4 == $subject12   || $subject4 == $subject13  || $subject4 == $subject14  || $subject4 == $subject15 || $subject4 == $subject16  || $subject4 == $subject17  || $subject4 == $subject18  || $subject4 == $subject19  || $subject4 == $subject20  ){
            return redirect()->back()->withsubfail('Subject 4 can not be add twice');
        }
        if($subject5 == $subject1 || $subject5 == $subject3 || $subject5 == $subject4 || $subject5 == $subject2 || $subject5 == $subject6 || $subject5 == $subject7 || $subject5 == $subject8 || $subject5 == $subject9 || $subject5 == $subject10 || $subject5 == $subject11  || $subject5 == $subject12   || $subject5 == $subject13  || $subject5 == $subject14  || $subject5 == $subject15 || $subject5 == $subject16  || $subject5 == $subject17  || $subject5 == $subject18  || $subject5 == $subject19  || $subject5 == $subject20  ){
            return redirect()->back()->withsubfail('Subject 5 can not be add twice');
        }
        if($subject6){
            if($subject6 == $subject1 || $subject6 == $subject3 || $subject6 == $subject4 || $subject6 == $subject5 || $subject6 == $subject2 || $subject6 == $subject7 || $subject6 == $subject8 || $subject6 == $subject9 || $subject6 == $subject10 || $subject6 == $subject11  || $subject6 == $subject12   || $subject6 == $subject13  || $subject6 == $subject14  || $subject6 == $subject15 || $subject6 == $subject16  || $subject6 == $subject17  || $subject6 == $subject18  || $subject6 == $subject19  || $subject6 == $subject20 ){
                return redirect()->back()->withsubfail('Subject 6 can not be add twice');
            }  
        }
        if($subject7){
            if($subject7 == $subject1 || $subject7 == $subject3 || $subject7 == $subject4 || $subject7 == $subject5 || $subject7 == $subject6 || $subject7 == $subject2 || $subject7 == $subject8 || $subject7 == $subject9 || $subject7 == $subject10 || $subject7 == $subject11  || $subject7 == $subject12   || $subject7 == $subject13  || $subject7 == $subject14  || $subject7 == $subject15 || $subject7 == $subject16  || $subject7 == $subject17  || $subject7 == $subject18  || $subject7 == $subject19  || $subject7 == $subject20 ){
                return redirect()->back()->withsubfail('Subject 7 can not be add twice');
            }
        }

        if($subject8){
            if($subject8 == $subject1 || $subject8 == $subject3 || $subject8 == $subject4 || $subject8 == $subject5 || $subject8 == $subject6 || $subject8 == $subject7 || $subject8 == $subject2 || $subject8 == $subject9 || $subject8 == $subject10 || $subject8 == $subject11  || $subject8 == $subject12   || $subject8 == $subject13  || $subject8 == $subject14  || $subject8 == $subject15 || $subject8 == $subject16  || $subject8 == $subject17  || $subject8 == $subject18  || $subject8 == $subject19  || $subject8 == $subject20  ){
                return redirect()->back()->withsubfail('Subject 8 can not be add twice');
            }
        }
        if($subject9){
            if($subject9 == $subject1 || $subject9 == $subject3 || $subject9 == $subject4 || $subject9 == $subject5 || $subject9 == $subject6 || $subject9 == $subject7 || $subject9 == $subject8 || $subject9 == $subject2 || $subject9 == $subject10 || $subject9 == $subject11  || $subject9 == $subject12   || $subject9 == $subject13  || $subject9 == $subject14  || $subject9 == $subject15 || $subject9 == $subject16  || $subject9 == $subject17  || $subject9 == $subject18  || $subject9 == $subject19  || $subject9 == $subject20  ){
                return redirect()->back()->withsubfail('Subject 9 can not be add twice');
            } 
        }
        
        if($subject10){
            if($subject10 == $subject1 || $subject10 == $subject3 || $subject10 == $subject4 || $subject10 == $subject5 || $subject10 == $subject6 || $subject10 == $subject7 || $subject10 == $subject8 || $subject10 == $subject9 || $subject10 == $subject2 || $subject10 == $subject11  || $subject10 == $subject12   || $subject10 == $subject13  || $subject10 == $subject14  || $subject10 == $subject15 || $subject10 == $subject16  || $subject10 == $subject17  || $subject10 == $subject18  || $subject10 == $subject19  || $subject10 == $subject20 ){
                return redirect()->back()->withsubfail('Subject 10 can not be add twice');
            }
        }
        if($subject11){
            if($subject11 == $subject1 || $subject11 == $subject3 || $subject11 == $subject4 || $subject11 == $subject5 || $subject11 == $subject6 || $subject11 == $subject7 || $subject11 == $subject8 || $subject11 == $subject9 || $subject11 == $subject2 || $subject11 == $subject10  || $subject11 == $subject12   || $subject11 == $subject13  || $subject11 == $subject14  || $subject11 == $subject15 || $subject11 == $subject16  || $subject11 == $subject17  || $subject11 == $subject18  || $subject11 == $subject19  || $subject11 == $subject20  ){
                return redirect()->back()->withsubfail('Subject 11 can not be add twice');
            }
        }
        if($subject12){
            if($subject12 == $subject1 || $subject12 == $subject3 || $subject12 == $subject4 || $subject12 == $subject5 || $subject12 == $subject6 || $subject12 == $subject7 || $subject12 == $subject8 || $subject12 == $subject9 || $subject12 == $subject11 || $subject12 == $subject10  || $subject12 == $subject2   || $subject12 == $subject13  || $subject12 == $subject14  || $subject12 == $subject15 || $subject12 == $subject16  || $subject12 == $subject17  || $subject12 == $subject18  || $subject12 == $subject19  || $subject12 == $subject20){
                return redirect()->back()->withsubfail('Subject 12 can not be add twice');
            }
        }
        if($subject13){
            if($subject13 == $subject1 || $subject13 == $subject3 || $subject13 == $subject4 || $subject13 == $subject5 || $subject13 == $subject6 || $subject13 == $subject7 || $subject13 == $subject8 || $subject13 == $subject9 || $subject13 == $subject2 || $subject13 == $subject10  || $subject13 == $subject12   || $subject13 == $subject11  || $subject13 == $subject14  || $subject13 == $subject15 || $subject13 == $subject16  || $subject13 == $subject17  || $subject13 == $subject18  || $subject13 == $subject19  || $subject13 == $subject20){
                return redirect()->back()->withsubfail('Subject 13 can not be add twice');
            }
        }
        if($subject14){
            if($subject14 == $subject1 || $subject14 == $subject3 || $subject14 == $subject4 || $subject14 == $subject5 || $subject14 == $subject6 || $subject14 == $subject7 || $subject14 == $subject8 || $subject14 == $subject9 || $subject14 == $subject2 || $subject14 == $subject10  || $subject14 == $subject12   || $subject14 == $subject11  || $subject14 == $subject13  || $subject14 == $subject15 || $subject14 == $subject16  || $subject14 == $subject17  || $subject14 == $subject18  || $subject14 == $subject19  || $subject14 == $subject20){
                return redirect()->back()->withsubfail('Subject 14 can not be add twice');
            }
        }
        if($subject15){
            if($subject15 == $subject1 || $subject15 == $subject3 || $subject15 == $subject4 || $subject15 == $subject5 || $subject15 == $subject6 || $subject15 == $subject7 || $subject15 == $subject8 || $subject15 == $subject9 || $subject15 == $subject2 || $subject15 == $subject10  || $subject15 == $subject12   || $subject15 == $subject11  || $subject15 == $subject14  || $subject15 == $subject13 || $subject15 == $subject16  || $subject15 == $subject17  || $subject15 == $subject18  || $subject15 == $subject19  || $subject15 == $subject20){
                return redirect()->back()->withsubfail('Subject 15 can not be add twice');
            }
        }
        if($subject16){
            if($subject16 == $subject1 || $subject16 == $subject3 || $subject16 == $subject4 || $subject16 == $subject5 || $subject16 == $subject6 || $subject16 == $subject7 || $subject16 == $subject8 || $subject16 == $subject9 || $subject16 == $subject2 || $subject16 == $subject10  || $subject16 == $subject12   || $subject16 == $subject11  || $subject16 == $subject14  || $subject16 == $subject13 || $subject16 == $subject15  || $subject16 == $subject17  || $subject16 == $subject18  || $subject16 == $subject19  || $subject16 == $subject20){
                return redirect()->back()->withsubfail('Subject 16 can not be add twice');
            }
        }
        if($subject17){
            if($subject17 == $subject1 || $subject17 == $subject3 || $subject17 == $subject4 || $subject17 == $subject5 || $subject17 == $subject6 || $subject17 == $subject7 || $subject17 == $subject8 || $subject17 == $subject9 || $subject17 == $subject2 || $subject17 == $subject10  || $subject17 == $subject12   || $subject17 == $subject11  || $subject17 == $subject14  || $subject17 == $subject13 || $subject17 == $subject16  || $subject17 == $subject15  || $subject17 == $subject18  || $subject17 == $subject19  || $subject17 == $subject20){
                return redirect()->back()->withsubfail('Subject 17 can not be add twice');
            }
        }    
        if($subject18){
            if($subject18 == $subject1 || $subject18 == $subject3 || $subject18 == $subject4 || $subject18 == $subject5 || $subject18 == $subject6 || $subject18 == $subject7 || $subject18 == $subject8 || $subject18 == $subject9 || $subject18 == $subject2 || $subject18 == $subject10  || $subject18 == $subject12   || $subject18 == $subject11  || $subject18 == $subject14  || $subject18 == $subject13 || $subject18 == $subject16  || $subject18 == $subject17  || $subject18 == $subject15  || $subject18 == $subject19  || $subject18 == $subject20){
                return redirect()->back()->withsubfail('Subject 18 can not be add twice');
            }
        }    
        if($subject19){
            if($subject19 == $subject1 || $subject19 == $subject3 || $subject19 == $subject4 || $subject19 == $subject5 || $subject19 == $subject6 || $subject19 == $subject7 || $subject19 == $subject8 || $subject19 == $subject9 || $subject19 == $subject2 || $subject19 == $subject10  || $subject19 == $subject12   || $subject19 == $subject11  || $subject19 == $subject14  || $subject19 == $subject13 || $subject19 == $subject16  || $subject19 == $subject17  || $subject19 == $subject18  || $subject19 == $subject15  || $subject19 == $subject20){
                return redirect()->back()->withsubfail('Subject 19 can not be add twice');
            }
        }    
        if($subject20){
            if($subject20 == $subject1 || $subject20 == $subject3 || $subject20 == $subject4 || $subject20 == $subject5 || $subject20 == $subject6 || $subject20 == $subject7 || $subject20 == $subject8 || $subject20 == $subject9 || $subject20 == $subject2 || $subject20 == $subject10  || $subject20 == $subject12   || $subject20 == $subject11  || $subject20 == $subject14  || $subject20 == $subject13 || $subject20 == $subject16  || $subject20 == $subject17  || $subject20 == $subject18  || $subject20 == $subject19  || $subject20 == $subject15){
                return redirect()->back()->withsubfail('Subject 20 can not be add twice');
            }
        }
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
        $batch->subj1 = $subject1;
		$batch->subj2 = $subject2;
		$batch->subj3 = $subject3;
		$batch->subj4 = $subject4;
        $batch->subj5 = $subject5;
        if($subject6){
            $batch->subj6 = $subject6;
        }
        if($subject7){
            $batch->subj7 = $subject7;
        }
        if($subject8){
            $batch->subj8 = $subject8;
        }
        if($subject9){
            $batch->subj9 = $subject9;
        }
        if($subject10){
            $batch->subj10 = $subject10;
        }
        if($subject11){
            $batch->subj11 = $subject11;
        }
        if($subject12){
            $batch->subj12 = $subject12;
        }
        if($subject13){
            $batch->subj13 = $subject13;
        }
        if($subject14){
            $batch->subj14 = $subject14;
        }
        if($subject15){
            $batch->subj15 = $subject15;
        }
        if($subject16){
            $batch->subj16 = $subject16;
        }
        if($subject17){
            $batch->subj17 = $subject17;
        }
        if($subject18){
            $batch->subj18 = $subject18;
        }
        if($subject19){
            $batch->subj19 = $subject19;
        }
        if($subject20){
            $batch->subj20 = $subject20;
        }
        $batch->save();
        return redirect(url(Auth::guard('schstaff')->user()->school_name.'/Batchs/Batchs'))->withsuccess('Successfully added ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($SchoolName,$id)
    {
        echo 'hfhe';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 'he';
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
