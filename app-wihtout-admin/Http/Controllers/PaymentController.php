<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;
use Validator;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;
use Mail;
class PaymentController extends Controller
{
	

	public function __construct()
	{
		$this->middleware('auth');		
	}

	public function stripepayment(Request $request){

		$user = auth()->user();
		$email_id = $user->email;
		$email = $email_id;
		$token = $request['stripeToken'];
		$plantype = $request['plantype'];
		
		if(isset($request['stripeToken']) && !empty($request['stripeToken']) ){
    		if($plantype == 'monthly'){
	    		$amount = 2.99;
	    		$interval = 'month';
    		}else{
	    		$amount = 35.88;
	    		$interval = 'year';
    		}
	    	//$secret_key = 'sk_test_kgpdXfhiCx7W7vCadIJVcHQk00UnpVuwpE';
	    	$keyser = config('services.stripe');
	    	$secret_key = $keyser['secret'];
	    	$stripe = new Stripe($secret_key);
	    	

	    	$customer = $stripe->customers()->create([
			    'email' => $email,
			    'source'  => $token,
			]);

			if($customer['id']){

				$charge = $stripe->charges()->create([
				    'customer' => $customer['id'],
				    'currency' => 'USD',
				    'amount'   => $amount
				]);

				if($charge["status"] == 'succeeded'){

					    $planId = '';
					    $plans = $stripe->plans()->all();
						foreach ($plans['data'] as $plan) {
						    if( $plan['active'] == true && $plan['interval'] == $interval){
						    	$planId = $plan['id'];
						    }
						}
						if(!empty($planId)){



							$subscription = $stripe->subscriptions()->create($customer['id'], [
							    'plan' => $planId,
							]);

							if($subscription['id']){

								$transactionId = $charge["balance_transaction"];
							    $currency = $charge["currency"];
							    $charge_id = $charge["id"];
							    $user = auth()->user();
								$user_id = $user->id;
								$email_id = $user->email;
								$name = $user->name;
							    $data=array(
							    	'user_id'=>$user_id,
							    	'amount'=>$amount,
							    	"transactionId"=>$transactionId,
							    	"currency"=>$currency,
							    	"charge_id"=>$charge_id,
							    	"email_id"=>$email_id,
							    	'package_type' => 'raunchy',
							    	"status"=>0
							    	);
								DB::table('transaction')->insert($data);

								DB::table('users')->where('id', $user_id)->update(
									[	
										'stripe_id' => $charge_id,
										'subscription_id' => $subscription['id'],
										'customer_id' => $customer['id'],
										'is_subcription_on' => 'yes',
										'plan_period_type' => $plantype,
										'last_date_sub' => null,
										'amount' => $amount
									]);

								/*$to_name = 'It ';
						        $to_email = 'itassists.us@gmail.com';
						        $data = array('name'=>'It tnma', "body" => "Test mail", "plan" => "Moanthly"); 
						        $data = array('name'=>$name, "body" => "Test mail", "plan" => $plantype, "link1" => '' );                
						        Mail::send('emails.payment', $data, function($message) use ($to_name, $to_email) {
						            $message->to($to_email, $to_name)
						                    ->subject('Purchase plan');
						            $message->from( config('mail.from_email') , config('mail.from_name') );
						        });*/

								/*$to_name = $name;
						        $to_email = $email_id;
						        $data = array('name'=>$name, "body" => "Test mail", "plan" => $plantype);             
						        Mail::send('emails.payment', $data, function($message) use ($to_name, $to_email) {
						            $message->to($to_email, $to_name)
						                    ->subject('Purchase plan');
						            $message->from( config('mail.from_email') , config('mail.from_name') );
						        });*/

								$res = array('status'=>'success','data'=>'success');

							}else{

								$res = array('status'=>'fail','data'=>'something went wrong in creating subscription');
							}

						}else{

							$res = array('status'=>'fail','data'=>'plan not active or not set');
						}
				}else{

					$res = array('status'=>'fail','data'=>$charge["failure_message"]);

				}

		    }else{

		    	
		    	$res = array('status'=>'fail','data'=>'Problem in creating customer');
				
		    }
		   

		}else{

			$res = array('status'=>'fail','data'=>'something went wrong');
		}
		 return json_encode($res);
    	
	}

	public function stripepayment_valentine(Request $request){

		
		
		$email = $request['customer']['email'];
		$token = $request['stripeToken'];
		$plantype = $request['plantype'];
		
		if(isset($request['stripeToken']) && !empty($request['stripeToken']) ){
    		
	    	$amount = 5;
	    	$keyser = config('services.stripe');
	    	$secret_key = $keyser['secret'];
	    	$stripe = new Stripe($secret_key);
	    	

	    	$customer = $stripe->customers()->create([
			    'email' => $email,
			    'source'  => $token,
			]);

			if($customer['id']){

				$charge = $stripe->charges()->create([
				    'customer' => $customer['id'],
				    'currency' => 'USD',
				    'amount'   => $amount
				]);

				if($charge["status"] == 'succeeded'){



					$transactionId = $charge["balance_transaction"];
				    $currency = $charge["currency"];
				    $charge_id = $charge["id"];
				    $user = auth()->user();
					$user_id = $user->id;
					$email_id = $user->email;
					$name = $user->name;
				    $data=array(
				    	'user_id'=>$user_id,
				    	'amount'=>$amount,
				    	"transactionId"=>$transactionId,
				    	"currency"=>$currency,
				    	"charge_id"=>$charge_id,
				    	"email_id"=>$email_id,
				    	'package_type' => 'valentine',
				    	"status"=>0
				    	);
					DB::table('transaction')->insert($data);

					DB::table('users')->where('id', $user_id)->update(
						[	
							'stripe_id' => $charge_id,
							'is_valentine_package' => 'yes'
						]);


					/*$to_name = $name;
			        $to_email = $email_id;
			        $data = array('name'=>$name, "body" => "Test mail", "plan" => $plantype);             
			        Mail::send('emails.payment', $data, function($message) use ($to_name, $to_email) {
			            $message->to($to_email, $to_name)
			                    ->subject('Valentine Day Package Activate');
			            $message->from( config('mail.from_email') , config('mail.from_name') );
			        });*/

					$res = array('status'=>'success','data'=>'success');

							

						
				}else{

					$res = array('status'=>'fail','data'=>$charge["failure_message"]);

				}

		    }else{

		    	
		    	$res = array('status'=>'fail','data'=>'Problem in creating customer');
				
		    }
		   

		}else{

			$res = array('status'=>'fail','data'=>'something went wrong');
		}
		 return json_encode($res);
    	
	}


	public function stripecancel(){

		$user = auth()->user();
		$customer_id = $user->customer_id;
		$subscription_id = $user->subscription_id;

		$keyser = config('services.stripe');
		//$secret_key = 'sk_test_kgpdXfhiCx7W7vCadIJVcHQk00UnpVuwpE';
		$secret_key = $keyser['secret'];
	    $stripe = new Stripe($secret_key);

	    $subscription = $stripe->subscriptions()->cancel($customer_id, $subscription_id, true);
	    if($subscription['id']){
	    	
	    	
	    	$user_id = $user->id;
			$last_date_sub = date('Y-m-d',$subscription['cancel_at']);					

			DB::table('users')->where('id', $user_id)->update(
				[	
					'last_date_sub' => $last_date_sub
				]);

			/*$name = $user->name;
			$to_name = $user->name;
	        $to_email = $user->email;
	        $data = array('name'=>$name, "body" => "Test mail", "plan" => '');             
	        Mail::send('emails.plancancelled', $data, function($message) use ($to_name, $to_email) {
	            $message->to($to_email, $to_name)
	                    ->subject('Your plan is cancelled successfully');
	            $message->from( config('mail.from_email') , config('mail.from_name') );
	        });*/

			return redirect()->back()->with('success', 'Your subcription is cancelled.'); 



	    }else{

	    	return redirect()->back()->with('error', 'Something went wrong to cancel your subcription');
	    }


    	
	}

	public function thankyou(){

		$this->data[] = '';
		return view('designer.thankyou', $this->data);
    	
	}





}
