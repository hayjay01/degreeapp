@extends('layouts.master')

@section('content')
<div class="row">
    @include('sidebar.sidebar')
    <div class="col-md-9">
        <div class="panel panel-success">
            <div class="panel-heading">
                All Session
            </div>
            <div class="panel-body">
                @if($session->count() === 0)
                    <p><h3>No session yet</h3></p>
                @else
                    <div class="table-responsive">          
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        S/N
                                    </th>
                                    <th>
                                        Session
                                    </th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($session as $sessions)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sessions->name }}</td>
                                        <td>
                                            <a href="{{ route('session.edit', ['id' => $sessions->id]) }}" class="btn btn-primary btn-xs">EDIT</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('session.delete', ['id' => $sessions->id]) }}" class="btn btn-danger btn-xs">DELETE</a>
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