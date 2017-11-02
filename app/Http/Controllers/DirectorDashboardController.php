<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use Auth;
use Session;
use App\Student;
use App\Department;
use App\AcademicSession;
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
        $students = DB::SELECT('SELECT ');
        dd($students);
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


    public function FunctionName($value='')
    {
        # code...
    }

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
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            $s=0;
            $f=0;
            if(!empty($data) && $data->count()){
                $now = Carbon::now('Africa/Lagos');
                foreach ($data as $key => $value) {
                    $insert[] = ['name' => $value->student_name,
                                 'matric_number' => $value->matric_number,
                                 'department' => $value->department,
                                 'email' => $value->email,
                                 'phone_number' => $value->phone_number,
                                 'session' => $value->session,
                                 'created_at' => $now, 
                                 'updated_at' => $now
                                ];

                    if(!empty($insert)){
                       $each_save = DB::table('students')->insert($insert);
                        // dd('Record inserted successfully.');
                        if ($each_save) {
                            $s++;
                        }else{
                            $f++;
                            continue;
                        }
                    }
                }
                // if(!empty($insert)){
                //    $each_save = DB::table('students')->insert($insert);
                //     dd('Record inserted successfully.');
                //     if ($each_save) {
                //         $s++;
                //     }else{
                //         $f++;
                //         continue;
                //     }
                // }
            }
        }
        if ($f > 0) {
            return back()->with('success',  $s . ' Students Uploaded Successfully. '.$f.' student failed to upload due to some format expected...Try uploading them again.');
            
        }
            return back()->with('success',  'All Student were successfully uploaded');

    }
}
