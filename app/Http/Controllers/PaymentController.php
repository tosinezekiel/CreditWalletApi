<?php

namespace App\Http\Controllers;

use Yabacon\Paystack;
use App\Transaction;
use App\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
   public function initialize(Request $request)
    {
    	request()->validate([
    		'user_id' =>'required',
    		'amount' => 'required|numeric',
    		'email' => 'required|email'
    	]);
    	$amount = 0;
    	$paymentreference = "CW".sprintf("%0.9s",str_shuffle(rand(12,30000) * time()));
    	 
    	 Transaction::create(['user_id'=>$request->user_id,'reference'=>$paymentreference,'amount'=>$request->amount]);

    	$paystack = new Paystack('sk_test_67acc3e54631a36fd1f862618e909caeb3306511');
    	$trx = $paystack->transaction->initialize(
    		[
    			'amount'=> $request->amount, /* in kobo */
    			'email'=>$request->email,
    			'reference' => $paymentreference,
    			'callback_url'=>'http://creditwallet.test/api/verify',
    			'metadata'=> [
    				'user_id'=> request()->user_id,
    				'reference'=> $paymentreference,
    				'amount'=> $request->amount
    			],
    		]
    	);
		if(!$trx){
		  exit($trx->data->message);
		}
		return $trx->data->authorization_url;
    }
    public function verify()
    { 
    	$paystack = new Paystack('sk_test_67acc3e54631a36fd1f862618e909caeb3306511');
    	$trx = $paystack->transaction->verify([
    		'reference'=>request()->reference
    	]);

    	if(!$trx->data->status="success"){
    		exit($trx->message);
	   	}
	   	$trans_ref = $trx->data->metadata->reference;
	   	$re = $trx->data->metadata->user_id;
	   	$am = $trx->data->metadata->amount;  
    
	    	$order = Order::create(['user_id'=>$re,'amount'=> $am]);
	    	Transaction::where('trans_ref',$trans_ref)
	    	->update([
	    		'paid' => true
	    	]);
    	return 'successful';
    }


}
