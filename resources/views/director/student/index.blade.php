@extends('layouts.master')

@section('content')
<div class="row">
    @include('sidebar.sidebar')
    <div class="col-md-8">
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
                                            {{ $students->department }}
                                        </td>
                                        <td>
                                            {{ $students->session }}
                                        </td>
                                        <td>
                                            Pending...
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