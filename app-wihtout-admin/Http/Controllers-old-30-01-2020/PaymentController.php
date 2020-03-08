<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;
class PaymentController extends Controller
{
	

	public function __construct()
	{
		$this->middleware('auth');		
	}

	public function stripepayment(Request $request){

		$post = $request->input();
		
		// Check whether stripe token is not empty 
		if(!empty($post['stripeToken'])){ 
		     
		    // Retrieve stripe token, card and user info from the submitted form data 
		    $token  = $post['stripeToken']; 
		    $name = $post['name']; 
		    $email = $post['email']; 
		    $card_number = $post['card-number']; 
		    $card_exp_month = $post['month']; 
		    $card_exp_year = $post['year']; 
		    $card_cvc = $post['cvc']; 
		    
		    
		    // Include Stripe PHP library 

		    //require_once base_path().'/vendor/stripe/stripe-php/init.php'; 
		    	echo "sdfsdf".app_path();exit; 
		    
		    exit;


		     
		}else{ 
		    $statusMsg = "Error on form submission."; 
		} 

    	
	}


	public function stripepayment_ttt(Request $request)
	{
		 
		 $validator = Validator::make($request->all(), [
		 'card_no' => 'required',
		 'ccExpiryMonth' => 'required',
		 'ccExpiryYear' => 'required',
		 'cvvNumber' => 'required',
		 //'amount' => 'required',
		 ]);
		 $input = $request->all();

		 if ($validator->passes()) { 

		 	$input = array_except($input,array('_token'));
			$stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
		 	try {
		 		$token = $stripe->tokens()->create([
					 'card' => [
					 'number' => $request->get('card_no'),
					 'exp_month' => $request->get('ccExpiryMonth'),
					 'exp_year' => $request->get('ccExpiryYear'),
					 'cvc' => $request->get('cvvNumber'),
					 ],
		 		]);

				if (!isset($token['id'])) {
				 	return redirect()->route('addmoney.paymentstripe');
				}
				
				$charge = $stripe->charges()->create([
				 'card' => $token['id'],
				 'currency' => 'USD',
				 'amount' => 20.49,
				 'description' => 'wallet',
				]);
				 
				if($charge['status'] == 'succeeded') {
					 echo "<pre>";
					 print_r($charge);exit();
					 return redirect()->route('addmoney.paymentstripe');
				} else {
				 	\Session::put('error','Money not add in wallet!!');
				 	return redirect()->route('addmoney.paymentstripe');
				}

			} catch (Exception $e) {
		 			\Session::put('error',$e->getMessage());
		 			return redirect()->route('addmoney.paymentstripe');
		 	} catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
		 			\Session::put('error',$e->getMessage());
		 			return redirect()->route('addmoney.paywithstripe');
		 	} catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
		 			\Session::put('error',$e->getMessage());
		 		return redirect()->route('addmoney.paymentstripe');
		 	}
		 }else{

		 }
	}


}
