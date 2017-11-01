<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use Auth;
use Session;
use App\Student;
use App\Department;
use App\AcademicSession;
use App\Payment;

class DirectorDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('director.dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStudent()
    {
        return view('director.student.create')->with('department', Department::all())
                                              ->with('session', AcademicSession::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStudent(StoreStudentRequest $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone_number = $request->phone_number;
        $student->department_id = $request->department;
        $student->matric_number = $request->matric_number;
        $student->session_id = $request->session;
        $student->save();

        Session::flash('success', 'New Student Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function allStudent()
    {
        return view('director.student.index')->with('student', Student::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editStudent($id)
    {
        return view('director.student.edit')->with('student', Student::find($id))
                                            ->with('department', Department::all())
                                            ->with('session', AcademicSession::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStudent(Request $request, $id)
    {
        $student = Student::find($id);
        if($student->name !== $request->name || $student->email !== $request->email || $student->phone_number !== $request->phone_number || $student->matric_number !== $request->matric_number || $student->department !== $request->department || $student->session !== $request->session)
        {
            if($student->name !== $request->name)
            {
                $this->validate($request,[
                    'name' => 'required',
                ]);

                $student->save();
            }
            if($student->email !== $request->email)
            {
                $this->validate($request, [
                    'email' => 'required|email|unique:students',
                ]);

                $student->save();
            }
            if($student->phone_number !== $request->phone_number)
            {
                $this->validate($request, [
                    'phone_number' => 'required|unique:students',
                ]);

                $student->save();
            }
            if($student->matric_number !== $request->matric_number)
            {
                $this->validate($request, [
                    'matric_number' => 'required|unique:students',
                ]);

                $student->save();
            }
            if($student->department_id !== $request->department)
            {
                $this->validate($request, [
                    'department' => 'required',
                ]);

                $student->save();
            }
            if($student->session_id !== $request->session)
            {
                $this->validate($request, [
                    'session' => 'required',
                ]);

                $student->save();
            }
            Session::flash('success', 'Updated Successfully');
            return redirect()->route('student.all');
        }
        Session::flash('info', 'No changes made');
        return redirect()->back();
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);
        $student->delete();
        Session::flash('success', 'Deleted successfully');
        return redirect()->back();
    }

    public function allDepartment()
    {
        return view('director.department.index')->with('department', Department::all());
    }

    public function createDepartment()
    {
        return view('director.department.create');
    }

    public function storeDepartment(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:departments',
        ]);

        $department = new Department;
        $department->name = $request->name;
        $department->save();
        Session::flash('success', 'New Department added successfully');
        return redirect()->back();
    }

    public function editDepartment($id)
    {
        return view('director.department.edit')->with('department', Department::find($id));
    }

    public function updateDepartment(Request $request, $id)
    {
        $department = Department::find($id);
        if($department->name !== $request->name)
        {
            $this->validate($request, [
                'name' => 'required|unique:departments'
            ]);
            $department->name = $request->name;
            $department->save();
            Session::flash('success', 'Department added successfully');
            return redirect()->route('department.all');
        }
        Session::flash('info', 'No changes made');
        return redirect()->back();
        
    }

    public function deleteDepartment($id)
    {
        $department = Department::find($id);
        $department->delete();
        Session::flash('success', 'Department deleted successfully');
        return redirect()->back();
    }

    public function allSession()
    {
        return view('director.session.index')->with('session', AcademicSession::all());
    }

    public function createSession()
    {
        return view('director.session.create');
    }

    public function storeSession(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:academic_sessions',
        ]);
        $session = new AcademicSession;
        $session->name = $request->name;
        $session->save();
        Session::flash('success', 'New Session Added');
        return redirect()->back();
    }

    public function editSession($id)
    {
        return view('director.session.edit')->with('session', AcademicSession::find($id));
    }

    public function updateSession(Request $request, $id)
    {
        $session = AcademicSession::find($id);
        if($session->name !== $request->name)
        {
            $this->validate($request, [
                'name' => 'required|unique:academic_sessions',
            ]);

            $session->name = $request->name;
            $session->save();
            Session::flash('success', 'Session updated successfully');
            return redirect()->route('session.all');
        }
        Session::flash('info', 'No changes made');
        return redirect()->back();
    }

    public function deleteSession($id)
    {
        $session = AcademicSession::find($id);
        $session->delete();
        Session::flash('success', 'Session deleted successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function verifyPayment()
    {
        return view('director.student.verify');
    }

    public function verifyPaymentPost(Request $request)
    {
        $this->validate($request, [
            'reference_code' => 'required',
        ]);

        $payment = Payment::where('reference_code', $request->reference_code)->first();
        if(!$payment)
        {
            Session::flash('error', 'No transaction recorded for this student');
            return redirect()->back();
        }

        $student = Student::where('matric_number', $payment->matric_number)->first();

        return view('director.student.student')->with('students', $student);
    }

    public function verifySuccess($id)
    {
        $student = Student::find($id);
        if($student->payment_status === "SUCCESS")
        {
            Session::flash('info', 'You have already verified this student');
            return redirect()->back();
        }
        $student->payment_status = "SUCCESS";
        $student->save();
        Session::flash('success', 'Payment verified successfully');
        return redirect()->back();
    }
}
