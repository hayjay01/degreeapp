@extends('layouts.master')

@section('content')
<section>
    <div class="container">
        <div class="row m-t-5p">
            
            <div class="col-md-2 col-sm-1"></div>
            <div class="col-md-8 col-sm-10">
            <h3><p class="text-center">Payment Reciept for "{{ $reciept->name }}"</p></h3>
            <p></br></p>
                <p>NAME : {{ $reciept->name }}</p>
                <p>Email : {{ $students->email }}</p>
                <p>Phone Number : {{ $students->phone_number }}</p>
                <p>Matric Number : {{ $reciept->matric_number }}</p>
                <p>Reference code : {{ $reciept->reference_code }}</p>
                <p>Ammount Paid : {{ $reciept->amount }}</p>
                <p>Payment Status : {{ $reciept->status }}</p>
                <p>Payment Reference : {{ $reciept->payment_reference }}</p>
			<p></br></p>
            <p></br></p>

            </div>
        </div>
    </div>
</section>
@stop