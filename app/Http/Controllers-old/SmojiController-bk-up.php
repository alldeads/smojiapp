<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
