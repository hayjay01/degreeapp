@extends('layouts.master')

@section('content')
<div class="row">
    @include('sidebar.sidebar')
    <div class="col-md-8">
        <div class="panel panel-success">
            <div class="panel-heading">
                Edit Student
            </div>
            <div class="panel-body">
                <form action="{{ route('director.student.update', ['id' => $student->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="">Student Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $student->name }}">

                        @if($errors->has('name'))
                            <strong>
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            </strong>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('matric_number') ? ' has-error' : '' }}">
                        <label for="">Student Matric Number</label>
                        <input type="text" class="form-control" name="matric_number" value="{{ $student->matric_number }}">

                        @if($errors->has('matric_number'))
                            <strong>
                                <span class="help-block">{{ $errors->first('matric_number') }}</span>
                            </strong>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                        <label for="">Student Department</label>
                        {{-- <input type="text" class="form-control" name="department" value="{{ $student->department }}"> --}}
                        <select name="department" class="form-control" id="">
                            <option value="">Select Department</option>
                            @foreach($department as $departments)
                                <option value="{{ $departments->id }}"
                                    @if($student->department_id == $departments->id)
                                        sesected
                                    @endif
                                >{{ $departments->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('department'))
                            <strong>
                                <span class="help-block">{{ $errors->first('department') }}</span>
                            </strong>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="">Student Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $student->email }}">

                        @if($errors->has('email'))
                            <strong>
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            </strong>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                        <label for="">Student Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" value="{{ $student->phone_number }}">

                        @if($errors->has('phone_number'))
                            <strong>
                                <span class="help-block">{{ $errors->first('phone_number') }}</span>
                            </strong>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('session') ? ' has-error' : '' }}">
                        <label for="">Session</label>
                        {{-- <input type="text" class="form-control" name="session" value="{{ $student->session }}"> --}}
                        <select name="session" class="form-control" id="">
                            <option value="">Select Session</option>
                            @foreach($session as $sessions)
                                <option value="{{ $sessions->id }}"
                                    @if($student->session_id === $sessions->id)
                                        selected
                                    @endif
                                >{{ $sessions->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('session'))
                            <strong>
                                <span class="help-block">{{ $errors->first('session') }}</span>
                            </strong>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Update Student</button>
                    </div>
                </form>
            </div>
            <div class="panel-footer text-center">Developed by <a href="#">Buildit.com.ng</a></div>
        </div>
    </div>
</div>
@stop