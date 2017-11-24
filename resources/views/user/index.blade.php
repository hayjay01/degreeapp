@extends('layouts.master')
	@section('content')
		<br> <br> <br>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<form method="POST"  action="{{ route('pay') }}" accept-charset="UTF-8"> 
					{{ csrf_field() }}					

					<div class="row">
						<div class="col-lg-8">
							<div class="form-group{{ $errors->has('matric_number') ? ' has-error' : '' }}">
								<label for="exampleInputEmail1">Matric Number</label>
								<input type="text" class="form-control" name="matric_number" id="matric_number">

								@if($errors->has('matric_number'))
									<strong>
										<span class="help-block">{{ $errors->first('matric_number') }}</span>
									</strong>
								@endif
							</div>
						</div>  <br> <br> <br> <br> 

						<div class="col-lg-8">
							<div class="form-group">
								<label for="">Full-Name</label>
								<input type="text" class="form-control" name="name" id="name" readonly required>
							</div>
						</div>

						<div class="col-lg-8">
							<div class="form-group">
								<label for="">Session</label>
								<input type="text" class="form-control" name="session" id="session" readonly required>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="form-group">
								<label for="">Department</label>
								<input type="text" class="form-control" name="department" id="department" readonly required>
							</div>
						</div>


					</div>

					<input type="hidden" id="email" name="email">
					<input type="hidden" name="matric_no" id="matric"> 
					<input type="hidden" name="orderID" value="345">
					<input type="hidden" name="amount" value="200000"> {{-- required in kobo --}}
					{{-- <input type="hidden" name="quantity" value="3"> --}}
					<input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
					<input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
					{{-- works only when using laravel 5.1, 5.2 --}}

					<input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

					<br> <br> <br> <br>

					<div class="row">
						<div class="col-lg-3 col-lg-offset-3 col-xs-4 col-xs-offset-3 col-sm-4 col-sm-offset-4">

						<input type="submit" id="submit" class="btn btn-success" value="Proceed with payment">
							
						</div>
					</div>
					<br> <br>
				</form>
			</div>
		</div>
	@endsection
