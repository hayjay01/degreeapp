@extends('layouts.master')
	@section('content')
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<form method="POST" action="">
					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
								<label for="exampleInputEmail1">Choose Session</label>
								<select class="form-control" required>
								  <option value="">Session</option>
								  <option value="2014/2015">2014/2015</option>
								  <option value="2016/2017">2016/2017</option>
								  <option value="2017/2018">2017/2018</option>
								</select>
							</div>
						</div>  <br> <br> <br> <br> <br> <br>

						<div class="col-lg-8">
							<div class="form-group">
								<label for="exampleInputEmail1">Choose Department</label>
								<select class="form-control" required>
								  <option value="">Department</option>
								  <option value="">Accounting</option>
								  <option value="">Agricultural-Science</option>
								  <option value="">Biology</option>
								  <option value="">Chemistry</option>
								  <option value="">Computer-Science</option>
								  <option value="">Educational-Management</option>
								</select>
							</div>
						</div>
					</div> <br> <br> <br>

					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
								<label for="exampleInputEmail1">Matric Number</label>
								<select class="form-control" required>
								  <option value="">Session</option>
								  <option value="2014/2015">2014/2015</option>
								  <option value="2016/2017">2016/2017</option>
								  <option value="2017/2018">2017/2018</option>
								</select>
							</div>
						</div> <br> <br> <br> <br> <br> <br> 

						<div class="col-lg-8">
							<div class="form-group">
								<label for="">Full-Name</label>
								<input type="text" class="form-control" name="full_name" value="Ajayi Nurudeen" disabled>
							</div>
						</div>


					</div>

					<br> <br> <br> <br>

					<div class="row">
						<div class="col-lg-3 col-lg-offset-3">

						<input type="submit" class="btn btn-success" value="Proceed with payment">
							
						</div>
					</div>
					<br> <br>
				</form>
			</div>
		</div>
	@endsection
