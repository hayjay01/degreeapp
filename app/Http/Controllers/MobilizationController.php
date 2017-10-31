<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Department;
use App\AcademicSession;

class MobilizationController extends Controller
{
    public function index(Request $r)
    {
    	$method = $r->isMethod('post');

    	switch ($method) {
    		case true:
    			
    			break;
    		
			case false:
				return view('user.index')->with('department', Department::all())
										 ->with('session', AcademicSession::all());
										     			
    			break;
    	}
    	
    }

	public function getName(Request $request)
    {
        $matric_no = $request->mat;
		$dep = $request->department;
		$ses = $request->session;
        $student = Student::where([ ['matric_number', $matric_no], ['department_id', $dep], ['session_id', $ses] ])->first();
        return $student->name;
    }

}
