<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use Validator;
use DB;
use Mail;
class PremiumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        /*$data = array('name'=>'It tnma', "body" => "Test mail", "plan" => "Moanthly", "link1" => "Moanthly");  
        return view('emails.payment',$data);
        exit;
        $to_name = 'It ';
        $to_email = 'itassists.us@gmail.com';
        $data = array('name'=>'It tnma', "body" => "Test mail", "plan" => "Moanthly");             
        Mail::send('emails.payment', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Purchase plan');
            $message->from( config('mail.from_email') , config('mail.from_name') );
        });
        exit;*/
        
        $stripe_api_key = config('services.stripe_api_key');
        $stripe_publishable_key = config('services.stripe_publishable_key');

        $user = auth()->user();
        $user_id = $user->id;
        $result = DB::table('users')->select('*')
         ->where('id', '=', $user_id)->get();
         
        $data['is_subcription_on'] = $result[0]->is_subcription_on;
        $data['last_date_sub'] = $result[0]->last_date_sub;
        $data['is_valentine_package'] = $result[0]->is_valentine_package;
        
        $data['name'] = $result[0]->name;
        $data['plan'] = $result[0]->stripe_id;
        $data['user_email'] = $result[0]->email;
        $data['amount'] = $result[0]->amount;
        $data['plan_period_type'] = $result[0]->plan_period_type;
        $data['stripe_publishable_key'] = $stripe_publishable_key;
        return view('auth.premium',$data);
    }

    public function profilesave(Request $request){

        $validator = Validator::make($request->all(), [
         'name' => 'required'
         ]);
         $input = $request->all();

        if ($validator->passes()) { 


            $validatedData = $request->validate([
                'name' => 'required',
            ]);

            //Change Password
            $user = Auth::user();
            $user->name = $request->get('name');
            $user->save();

            return redirect()->back()->with("success","Name changed successfully !");
        }else{
            return redirect()->back()->withErrors($validator);
        }

    }

}
