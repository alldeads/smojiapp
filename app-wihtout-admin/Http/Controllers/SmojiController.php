<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;
class SmojiController extends Controller
{
	protected $data;

	public function __construct()
	{
		$this->middleware('auth');
		$arr['female']['assets'] = array(
			'Skin', 'Eyes', 'Hair', 'Lips'
		);

		$arr['female']['counts'] = array(
			'skin' => 6,
			'eyes' => 6,
			'hair' => 49,
			'lips' => 18,
			'stickers' => 21,
			'free' => 10,
			'premium' => 10,
			'valentine' => 4,
		);

		$arr['male']['assets'] = array(
			'Skin', 'Eyes', 'Hair', 'Beard'
		);

		$arr['male']['counts'] = array(
			'skin'  => 6,
			'eyes'  => 6,
			'hair'  => 45,
			'beard' => 13,
			'stickers' => 21,
			'free' => 10,
			'premium' => 3,
			'valentine' => 4,
		);

		$this->data = $arr;
	}

    public function index()
    {
    	$this->data['gender'] = "female";

    	$user = auth()->user();
        $user_id = $user->id;

    	$data = DB::table('my_smoji')->select('save_smoji_data')->where('user_id', '=', $user_id)->get();                      	
    	$data = json_decode(json_encode($data), true);
        if( isset($data) && !empty($data) ){
            $decode_data_string = encrypt($data[0]['save_smoji_data']); 
            return redirect('/smoji/savedresults/'.$decode_data_string.' '); 
        }else{
            return view('designer.index', $this->data);
        }

    }

    public function changesomji()
    {
    	$this->data['gender'] = "female";
		return view('designer.index', $this->data);
    }

    public function create( $gender )
    {
    	$this->data['gender'] = $gender == "male" ? "male" : "female";    	
		$months = array('01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December');

    	$this->data['months'] = $months;
    	return view('designer.create', $this->data);
    }
     public function detailpage( $imagename )
    {
    	$this->data['imagename'] = $imagename;
    	return view('designer.imagedetail', $this->data);
    }

    public function result( Request $request )
    {

    	$stripe_api_key = config('services.stripe_api_key');
        $stripe_publishable_key = config('services.stripe_publishable_key');

    	$user = auth()->user();
		$email = $user->email;
		$stripe_id = $user->stripe_id;
		$is_subcription_on = $user->is_subcription_on;
		$is_valentine_package = $user->is_valentine_package;
		if($is_subcription_on == 'no'){
			$is_premium = 'blur';
		}else{
			$is_premium = 'blurout';
		}
		$is_valentine = 'blur';
		if($is_valentine_package == 'yes'){
			$is_valentine = 'blurout';
		}

    	$this->data['skin_result']   = $request->inputskins;
    	$this->data['eye_result']    = $request->inputeyes;
    	$this->data['lip_result']    = $request->inputlips;
    	$this->data['hair_result']   = $request->inputhairs;
    	$this->data['beard_result']  = $request->inputbeards;
    	$this->data['gender']        = $request->gender;
    	$this->data['subscription']  = $request->radiosubscription;
    	$this->data['user_email']  = $email;
    	$this->data['is_premium']  = $is_premium;
    	$this->data['is_valentine']  = $is_valentine;
    	$this->data['stripe_publishable_key']  = $stripe_publishable_key;
    	
    	$save_setting_data = array(
    		'skin_result'   => $request->inputskins,
	    	'eye_result'    => $request->inputeyes,
	    	'lip_result'    => $request->inputlips,
	    	'hair_result'   => $request->inputhairs,
	    	'beard_result'  => $request->inputbeards,
	    	'gender'        => $request->gender,
	    	'subscription'  => $request->radiosubscription
    	);
    	$this->insert($save_setting_data);
    	// dd($this->data['gender']);
    	
    	return view('designer.result', $this->data);
    }

    public function resultFromSaved( $data )
    {	
    	$stripe_api_key = config('services.stripe_api_key');
        $stripe_publishable_key = config('services.stripe_publishable_key');
    	$user = auth()->user();
		$email = $user->email;
		$stripe_id = $user->stripe_id;
		if(empty($stripe_id)){
			$is_premium = 'blur';
		}else{
			$is_premium = 'blurout';
		}
		$is_valentine_package = $user->is_valentine_package;
		$is_valentine = 'blur';
		if($is_valentine_package == 'yes'){
			$is_valentine = 'blurout';
		}

    	$decrypted = decrypt($data);

    	$json_data_array = json_decode($decrypted,true);
    	
    	
    	$this->data['skin_result']   = $json_data_array['skin_result'];
    	$this->data['eye_result']    = $json_data_array['eye_result'];
    	$this->data['lip_result']    = $json_data_array['lip_result'];
    	$this->data['hair_result']   = $json_data_array['hair_result'];
    	$this->data['beard_result']  = $json_data_array['beard_result'];
    	$this->data['gender']        = $json_data_array['gender'];
    	$this->data['subscription']  = $json_data_array['subscription'];
    	$this->data['user_email']  = $email;
    	$this->data['is_premium']  = $is_premium;
    	$this->data['is_valentine']  = $is_valentine;
    	$this->data['stripe_publishable_key']  = $stripe_publishable_key;
    	return view('designer.result', $this->data);
    }

    public function saveimg(Request $request){

    	$image = $_POST['image'];
		$location = public_path() . '/uploads/';
		$image_parts = explode(";base64,", $image);

		$image_base64 = base64_decode($image_parts[1]);

		$filename = "screenshot_".uniqid().'.png';

		$file = $location . $filename;

		file_put_contents($file, $image_base64);

		//$filepath = public_path('uploads/image/')."abc.jpg";
		//$filepath = public_path('uploads/image/')."abc.jpg";
		echo $filename;
    }

    public function download($filename)
    {
        $location = public_path() . '/uploads/';
        $file = $location . $filename;
        return response()->download($file);
    }

    public function insert($request){
    	$json_data = json_encode($request);    	
		$user = auth()->user();
		$user_id = $user->id;

		//$users_count = DB::table('my_smoji')->where('save_smoji_data', '=', $json_data)->count();
		$json_data_array = json_decode($json_data,true);
		/*$users_count = DB::table('my_smoji')->where('gender', '=', $json_data_array['gender'])->count();
	    if($users_count == 0){
			$data=array('gender'=>$json_data_array['gender'],'user_id'=>$user_id,"save_smoji_data"=>$json_data,"status"=>0);
			DB::table('my_smoji')->insert($data);
		}*/

		DB::table('my_smoji')
	    ->updateOrInsert(
	        //['user_id' => $user_id, 'gender' => $json_data_array['gender'] ],
	        ['user_id' => $user_id ],
	        [
	        	'gender' => $json_data_array['gender'],
	        	'save_smoji_data' => $json_data,
	        	'status' => 0
	        ]
	    );

	}






}
