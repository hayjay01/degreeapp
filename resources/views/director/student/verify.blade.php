@extends('layouts.master')

@section('content')
<div class="row">
    @include('sidebar.sidebar')
    <div class="col-md-8">
        <div class="panel panel-success">
            <div class="panel-heading">
                Verify Student Payment
            </div>
            <div class="panel-body">
                <form action="{{ route('verify.student.payment.process') }}" method="GET">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('reference_code') ? ' has-error' : '' }}">
                        <label for="">Enter Reference Code on reciept</label>
                        <input type="text" class="form-control" name="reference_code" value="{{ old('name') }}">

                        @if($errors->has('reference_code'))
                            <strong>
                                <span class="help-block">{{ $errors->first('reference_code') }}</span>
                            </strong>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Verify Payment</button>
                    </div>
                </form>
            </div>
            <div class="panel-footer text-center">Developed by <a href="#">Buildit.com.ng</a></div>
        </div>
    </div>
</div>
@stop