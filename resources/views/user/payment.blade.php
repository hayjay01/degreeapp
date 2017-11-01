@extends('layouts.master')
	@section('content')
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                    <div class="row" style="margin-bottom:40px;">
                    <div class="col-md-8 col-md-offset-1">
                        
                        {{-- <input type="hidden" name="matric_number" value="{{ $mat_number }}"> required --}}
                        <input type="hidden" name="orderID" value="345">
                        <input type="hidden" name="amount" value="200000"> {{-- required in kobo --}}
                        {{-- <input type="hidden" name="quantity" value="3"> --}}
                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                        <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                        {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}


                        <p>
                        <button class="bg-linegradent1 f-10  p-2 c-white bd-brandl bd-4 text-center width-100p m-l-13p dis-inline-b mm-l-0" type="submit" value="Pay Now!">
                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                        </button>
                        </p>
                    </div>
                    </div>
                </form>
			</div>
		</div>
	@endsection
