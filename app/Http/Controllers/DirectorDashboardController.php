<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use Auth;
use Session;
use App\Student;
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
        return view('director.student.create');
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
        $student->department = $request->department;
        $student->matric_number = $request->matric_number;
        $student->session = $request->session;
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
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.form');
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
