@extends('layouts.master')

@section('content')
<div class="row">
    @include('sidebar.sidebar')
    <div class="col-md-8">
        <div class="panel panel-success">
            <div class="panel-heading">
                Edit Session
            </div>
            <div class="panel-body">
                <form action="{{ route('session.update', ['id' => $session->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="">Edit Session</label>
                        <input type="text" class="form-control" name="name" value="{{ $session->name }}">

                        @if($errors->has('name'))
                            <strong>
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            </strong>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Update Session</button>
                    </div>
                </form>
            </div>
            <div class="panel-footer text-center">Developed by <a href="#">Buildit.com.ng</a></div>
        </div>
    </div>
</div>
@stop