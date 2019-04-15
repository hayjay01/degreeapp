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
use Excel;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;


class DirectorDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("dd");
        $result = [];
        $departments = Department::withCount('student')->get();
        foreach ($departments as $dept) {
            // $employee_count_per_department = DB::SELECT("select COUNT(id_sys_departments) as numb_of_emp FROM hr_employee_departments WHERE id_sys_departments = '$dept->id' and advance_company_id = '$company_id'");
            $result[] = [
                'name' => $dept->name,
                'y' => $dept->student_count,
                'drilldown' => $dept->student_count,
            ];
        }
        $all_data = json_encode($result);
        return view('director.dashboard.index', compact('all_data'));
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
        // $students = DB::SELECT('SELECT ');
        // dd($students);
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
            Session::flash('success', 'Student Data Updated Successfully');
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
    // public function FunctionName($value='')
    // {
    //     # code...
    // }

    public function downloadExcel($type)
    {
        $data = Student::get()->toArray();
        return Excel::create('all_graduating_student', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel()
    {
        // dd($request->student_name);    
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
//             dd($data);
            $s=0;
            $f=0;
                $now = Carbon::now('Africa/Lagos');
                foreach ($data as $key => $value) {
                    // mapping related department_id of the student with the department table
                    $retrieved_dept_id = DB::SELECT("SELECT id, name FROM departments WHERE name = '$value->department'");
//                    dd($value->department);
                    if (!empty($retrieved_dept_id)) {
                        $retrieved_dept_id[0]->id;
                        //pick the first result returned from the database
                        $retrieved_dept_id = $retrieved_dept_id[0]->id;
                    }else{
                        $retrieved_dept_id = null;
                    }

                    // mapping related session_id of the student with the sessions table
                    $retrieved_session_id = DB::SELECT("SELECT id, name FROM academic_sessions WHERE name = '$value->session'");
                    if (!empty($retrieved_session_id)) {
                        $retrieved_session_id[0]->id;
                        //pick the first result returned from the database
                        $retrieved_session_id = $retrieved_session_id[0]->id;
                    }else{
                        $retrieved_session_id = null;
                    }
//                    dd($retrieved_session_id[5]);


                    //checking if the current loop stage of the student dept is found and at the same time, if the session allocated to the student exist
                    if(!is_null($retrieved_dept_id) && !is_null($retrieved_session_id)){

                        $insert[] = ['name' => $value->name,
                                     'matric_number' => $value->matric_number,
                                     'department_id' => $retrieved_dept_id,
                                     'email' => $value->email,
                                     'phone_number' => $value->phone_number,
                                     'session_id' => $retrieved_session_id,
                                     'created_at' => $now,
                                     'updated_at' => $now
                                    ];
//                        dd($insert);

                        if(!empty($insert)){
                           $each_save = DB::table('students')->insert($insert);
                                $s++;
                        }

                    }else{
                        $f++;
                        continue;
                    }

                }//endforeach or loop
            }
        if ($f > 0) {
            return back()->with('success',  $s . ' Students Uploaded Successfully. '.$f.' student failed to upload due to some format expected...Try uploading them again.');
            
        }
            return back()->with('success',  'All Student were successfully uploaded');
    }
}
