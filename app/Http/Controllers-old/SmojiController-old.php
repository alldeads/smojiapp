<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
class SmojiController extends Controller
{
	protected $data;

	public function __construct()
	{
		$this->middleware('auth');
		$arr['female']['assets'] = array(
			'Skin', 'Eyes', 'Hair'
		);

		$arr['female']['counts'] = array(
			'skin' => 6,
			'eyes' => 6,
			'hair' => 49,
			'stickers' => 21,
			'free' => 21,
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
			'free' => 21,
			'premium' => 10
		);

		$this->data = $arr;
	}

    public function index()
    {

    	$this->data['gender'] = "female";

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
    	$this->data['hair_result']   = $request->inputhairs;
    	$this->data['beard_result']  = $request->inputbeards;
    	$this->data['gender']        = $request->gender;
    	$this->data['subscription']  = "free";

    	// dd($this->data['gender']);

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
}
