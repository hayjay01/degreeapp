@extends('layouts.master')

@section('content')
<div class="row">
    @include('sidebar.sidebar')
    <div class="col-md-30">
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
                                        <center>
                                            S/N
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                             Name
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                             Email
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                             Phone Number
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                             Matric Number
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                             Department
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                            Session
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                            Payment Status
                                        </center>
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
                                            {{ $students->academicsession->name }}
                                        </td>
                                        <td>
                                            Pending...
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
@stop