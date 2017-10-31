@extends('layouts.master')

@section('content')
<div class="row">
    @include('sidebar.sidebar')
    <div class="col-md-9">
        <div class="panel panel-success">
            <div class="panel-heading">
                All Department
            </div>
            <div class="panel-body">
                @if($department->count() === 0)
                    <p><h3>No department yet</h3></p>
                @else
                    <div class="table-responsive">          
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        S/N
                                    </th>
                                    <th>
                                        Department
                                    </th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($department as $departments)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $departments->name }}</td>
                                        <td>
                                            <a href="{{ route('department.edit', ['id' => $departments->id]) }}" class="btn btn-primary btn-xs">EDIT</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('department.delete', ['id' => $departments->id]) }}" class="btn btn-danger btn-xs">DELETE</a>
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