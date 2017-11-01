@extends('layouts.master')

@section('content')
<div class="row">
    @include('sidebar.sidebar')
    <div class="col-md-9">
        <div class="panel panel-success">
            <div class="panel-heading">
                All Students
            </div>
            <div class="panel-body">
                @if($student->count() === 0)
                    <p><h3>No Students yet</h3></p>
                @else
                    <div class="table-responsive">          
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        S/N
                                    </th>
                                    <th>
                                        Student's Name
                                    </th>
                                    <th>
                                        Student's Email
                                    </th>
                                    <th>
                                        Student's Phone Number
                                    </th>
                                    <th>
                                        Student's Matric Number
                                    </th>
                                    <th>
                                        Student's Department
                                    </th>
                                    <th>
                                        Session
                                    </th>
                                    <th>
                                        Payment Status
                                    </th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($student as $students)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $students->name }}</td>
                                        <td>
                                            {{ $students->email }}
                                        </td>
                                        <td>
                                            {{ $students->phone_number }}  
                                        </td>
                                        <td>
                                            {{ $students->matric_number }}
                                        </td>
                                        <td>
                                            {{ $students->department->name }}
                                        </td>
                                        <td>
                                            {{ $students->session->name }}
                                        </td>
                                        <td>
                                            {{ $students->payment_status }}
                                        </td>
                                        <td>
                                            <a href="{{ route('director.student.edit', ['id' => $students->id]) }}" class="btn btn-primary btn-xs">EDIT</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('director.student.delete', ['id' => $students->id]) }}" class="btn btn-danger btn-xs">DELETE</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            <div class="panel-footer text-center">Developed by <a href="#">Buildit.com.ng</a></div>
        </div>
    </div>
</div>
@stop