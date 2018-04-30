<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;


class SchoolAdminController extends Controller
{
    //
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