@extends('layouts.master')
	@section('content')
		<br> <br> <br>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<form method="POST" action="{{  }}">
					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
								<label for="exampleInputEmail1">Choose Session</label>
								<select class="form-control" id="session" name="session" required>
								  <option value="">Select Session</option>
								  @foreach($session as $sessions)
								  	<option value="{{ $sessions->id }}">{{ $sessions->name }}</option>
								  @endforeach
								</select>
							</div>
						</div>  <br> <br> <br> <br> 
						<div class="col-lg-8">
							<div class="form-group">
								<label for="exampleInputEmail1">Choose Department</label>
								<select class="form-control" id="department" name="department" required>
									<option value="">Select Department</option>
									@foreach($department as $dept)
										<option value="{{ $dept->id }}">{{ $dept->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div> <br> <br> <br>

					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
								<label for="exampleInputEmail1">Matric Number</label>
								<input type="text" class="form-control" name="matric_number" id="matric_number">
							</div>
						</div> <br> <br> <br> <br>

						<div class="col-lg-8">
							<div class="form-group">
								<label for="">Full-Name</label>
								<input type="text" class="form-control" name="name" id="name" readonly>
							</div>
						</div>


					</div>

					<br> <br> <br> <br>

					<div class="row">
						<div class="col-lg-3 col-lg-offset-3 col-xs-4 col-xs-offset-3 col-sm-4 col-sm-offset-4">

						<input type="submit" class="btn btn-success" value="Proceed with payment">
							
						</div>
					</div>
					<br> <br>
				</form>
			</div>
		</div>
	@endsection
