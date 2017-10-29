@extends('layouts.master')

@section('content')
<div class="row">
    @include('sidebar.sidebar')
    <div class="col-md-8">
        <div class="panel panel-success">
            <div class="panel-heading">
                Add Student (Single Upload)
            </div>
            <div class="panel-body">
                <form action="{{ route('director.student.process') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="">Student Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                        @if($errors->has('name'))
                            <strong>
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            </strong>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('matric_number') ? ' has-error' : '' }}">
                        <label for="">Student Matric Number</label>
                        <input type="text" class="form-control" name="matric_number" value="{{ old('matric_number') }}">

                        @if($errors->has('matric_number'))
                            <strong>
                                <span class="help-block">{{ $errors->first('matric_number') }}</span>
                            </strong>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                        <label for="">Student Department</label>
                        <input type="text" class="form-control" name="department" value="{{ old('department') }}">

                        @if($errors->has('department'))
                            <strong>
                                <span class="help-block">{{ $errors->first('department') }}</span>
                            </strong>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="">Student Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if($errors->has('email'))
                            <strong>
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            </strong>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                        <label for="">Student Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}">

                        @if($errors->has('phone_number'))
                            <strong>
                                <span class="help-block">{{ $errors->first('phone_number') }}</span>
                            </strong>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('session') ? ' has-error' : '' }}">
                        <label for="">Session</label>
                        <input type="text" class="form-control" name="session" value="{{ old('session') }}">

                        @if($errors->has('session'))
                            <strong>
                                <span class="help-block">{{ $errors->first('session') }}</span>
                            </strong>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Add Student</button>
                    </div>
                </form>
            </div>
            <div class="panel-footer text-center">Developed by <a href="#">Buildit.com.ng</a></div>
        </div>
    </div>
</div>
@stop