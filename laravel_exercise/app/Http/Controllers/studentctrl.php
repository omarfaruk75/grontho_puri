<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class studentctrl extends Controller
{
    function index(){
        // $st="This is from Student Controller";
        // return view('student')->with("student", $st);

        // $st=array("student"=>"This is from Student Controller");
        // return view('student')->with($st);

        $student="This is from Student Controller";
        $data=array("Kamal","jamal","karim");
        return view('student',compact('student','data'));
    }

    function student_list(){
        $data=array("Kamal","jamal","karim");
        return view('student_list',compact('data'));
    }
}
