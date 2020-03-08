<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;
use Validator;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;
class PaymentController extends Controller
{
	

	public function __construct()
	{
		$this->middleware('auth');		
	}

	public function stripepayment(Request $request){

	
		$email = $request['customer']['email'];
		$token = $request['stripeToken'];
		
		if(isset($request['stripeToken']) && !empty($request['stripeToken']) ){
    	
	    	$amount = 1;
	    	$secret_key = 'sk_test_kgpdXfhiCx7W7vCadIJVcHQk00UnpVuwpE';
	    	$stripe = new Stripe($secret_key);
	    	$charge = $stripe->charges()->create([
			    'currency' => 'USD',
			    'amount'   => $amount,
			    'source'  => $token
			]);
		    
		    if($charge["status"] == 'succeeded'){

			    $transactionId = $charge["balance_transaction"];
			    $currency = $charge["currency"];
			    $charge_id = $charge["id"];
			    $user = auth()->user();
				$user_id = $user->id;
				$email_id = $user->email;
			    $data=array(
			    	'user_id'=>$user_id,
			    	'amount'=>$amount,
			    	"transactionId"=>$transactionId,
			    	"currency"=>$currency,
			    	"charge_id"=>$charge_id,
			    	"email_id"=>$email_id,
			    	"status"=>0
			    	);
				DB::table('transaction')->insert($data);

				DB::table('users')->where('id', $user_id)->update(['stripe_id' => $charge_id]);

				$res = array('status'=>'success','data'=>'success');

		    }else{

		    	$res = array('status'=>'fail','data'=>$charge["failure_message"]);
				
		    }
		    return json_encode($res);

		}else{

			return 'something went wrong';
		}
    	
	}

	public function thankyou(){

		$this->data[] = '';
		return view('designer.thankyou', $this->data);
    	
	}





}
