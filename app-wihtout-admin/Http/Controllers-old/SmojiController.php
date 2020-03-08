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
			'premium' => 10
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
			'premium' => 3
		);

		$this->data = $arr;
	}

    public function index()
    {

    	$this->data['gender'] = "female";
    	$save_data = $this->getSavedSmoji();
    	$this->data['save_smoji'] = $save_data;
    	return view('designer.index', $this->data);
    }

    public function create( $gender )
    {
    	$this->data['gender'] = $gender == "male" ? "male" : "female";
    	return view('designer.create', $this->data);
    }

    public function result( Request $request )
    {

    	$this->data['skin_result']   = $request->inputskins;
    	$this->data['eye_result']    = $request->inputeyes;
    	$this->data['lip_result']    = $request->inputlips;
    	$this->data['hair_result']   = $request->inputhairs;
    	$this->data['beard_result']  = $request->inputbeards;
    	$this->data['gender']        = $request->gender;
    	$this->data['subscription']  = $request->radiosubscription;
    	
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

    	$decrypted = decrypt($data);

    	$json_data_array = json_decode($decrypted,true);
    	
    	$this->data['skin_result']   = $json_data_array['skin_result'];
    	$this->data['eye_result']    = $json_data_array['eye_result'];
    	$this->data['lip_result']    = $json_data_array['lip_result'];
    	$this->data['hair_result']   = $json_data_array['hair_result'];
    	$this->data['beard_result']  = $json_data_array['beard_result'];
    	$this->data['gender']        = $json_data_array['gender'];
    	$this->data['subscription']  = $json_data_array['subscription'];
    	
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

		$users_count = DB::table('my_smoji')
	     ->where('save_smoji_data', '=', $json_data)->count();
	    if($users_count == 0){
			$data=array('user_id'=>$user_id,"save_smoji_data"=>$json_data,"status"=>0);
			DB::table('my_smoji')->insert($data);
		}
	}


	public function getSavedSmoji(){
    	
    	$user = auth()->user();
		$user_id = $user->id;
		$data = DB::table('my_smoji')->select('save_smoji_data')
	     ->where('user_id', '=', $user_id)->get();
	    return $data;
	}

}
