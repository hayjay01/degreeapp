@extends('layouts.master')

@section('content')
<div class="row">
    @include('sidebar.sidebar')
    <div class="col-md-9">
        <div class="panel panel-success">
            <div class="panel-heading">
                Verify payment of this student
            </div>
            <div class="panel-body">
                <div class="table-responsive">          
                    <table class="table table-hover">
                        <thead>
                            <tr>
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
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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
                                @if($students->payment_status === "PENDING...")
                                    <a href="{{ route('verify.success', ['id' => $students->id]) }}" class="btn btn-primary btn-xs">Verify</a>
                                @else
                                    Already Verified
                                @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer text-center">Developed by <a href="#">Buildit.com.ng</a></div>
        </div>
    </div>
</div>
@stop