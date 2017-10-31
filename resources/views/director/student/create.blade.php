@extends('layouts.master')

@section('content')
<div class="row">
    @include('sidebar.sidebar')
    <div class="col-md-8">
        <div class="panel panel-success">
            <div class="panel-heading">
                Add Student (Bulk Upload or Single Upload)
            </div>
            <div class="panel-body">
                <section class="dashboard-counts no-padding-bottom" style="padding: 7px 0px;">
                    <div class="container-fluid">
                        <div class="row bg-white has-shadow">
                            <p align="center"><a href="{{ asset('eksu_students_upload.xlsx') }}">Click here to download the CSV format to upload bulk data</a> </p>
                            <div style="width: 100%;margin-bottom: 11px;">
                                <h3 align="center" style="clear: both;margin-right:  ">
                                    Batch Upload For Students</h3></div>
                            <form class="dash-form" action="{{ url('director/dashboard/importExcel') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        <input type="file" required name="import_file" class="dash-input">
                                    </div>
                                    {{-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <select class="company_search form-control" name="company_id" id='company_search' required>
                                        </select>
                                    </div> --}}
                                </div> <br>
                                <div class="pull-left">
                                    <input type="submit" value="Upload Data" class="btn btn-large btn-default">
                                </div> <br>
                            </form> <br>
                            <?php $a = "xls"; $b = "xlsx"; ?>
                            <center>
                                <a href="{{ URL::to('director/dashboard/downloadExcel', $a) }}"><button class="btn btn-success">Download All Students (Excel-xls) </button></a>
                                <a href="{{ URL::to('director/dashboard/downloadExcel', $b) }}"><button class="btn btn-success">Download All Students (Excel-xlsx)</button></a>
                            </center>
                        </div> <hr>
                    </div> <br>
                </section>
                <div style="width: 100%;margin-bottom: 11px;">
                                <h2 align="center" style="clear: both;margin-right:  ">
                                    Single Student Entry</h2></div>
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
                        <center>
                            <button class="btn btn-default" type="submit">Add Student</button>
                        </center>
                    </div>
                </form>
            </div>
            <div class="panel-footer text-center">Developed by <a href="#">Buildit.com.ng</a></div>
        </div>
    </div>
</div>
@stop