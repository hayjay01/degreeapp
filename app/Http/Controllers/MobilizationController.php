<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Department;
use App\AcademicSession;
use App\Payment;

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
        $student = Student::where('matric_number', $matric_no)->first();
        return response()->json(['name' => $student->name, 'academic' => $student->session->name, 'email' => $student->email, 'department' => $student->department->name]);
    }

	public function validateStudent(Request $request)
	{
		$this->validate($request, [
			'session' => 'required',
			'department' => 'required',
			'matric_number' => 'required',
		]);

		return view('user.payment')->with('mat_no', $request->matric_number);
	}

}
