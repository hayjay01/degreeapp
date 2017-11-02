<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use App\Student;
use App\Payment;
use Session;

class PaymentController extends Controller 
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
        $payment = Payment::where('matric_number', $request->matric_number)->first();
        if(count($payment) !== 0)
        {
            Session::flash('info', 'You have paid already...');
            return redirect()->back();
        }else{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }
        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        //dd($paymentDetails);
        $email = $paymentDetails['data']['customer']['email'];
        $student = Student::where('email', $email)->first();
        // dd($student->name);
        $payment = Payment::create([
            'student_id' => $student->id,
            'matric_number' => $student->matric_number,
            'name' => $student->name,
            'reference_code' => $paymentDetails['data']['customer']['id'],
            'status' => $paymentDetails['data']['status'],
            'amount' => ($paymentDetails['data']['amount'])/100,
            'payment_reference' => $paymentDetails['data']['reference'],
        ]);

        Session::flash('success', 'Your payment was successful...');
        return redirect()->route('reciept', ['id' => $payment->id]); 
        
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function getReciept($id)
    {
        $payment = Payment::find($id);
        $student = Student::where('matric_number', $payment->matric_number)->first();
        return view('user.reciept')->with('reciept', $payment)
                                   ->with('students', $student);
    }
}
