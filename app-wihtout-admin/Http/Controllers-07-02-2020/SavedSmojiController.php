<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;
class SavedSmojiController extends Controller
{
	protected $data;

	public function __construct()
	{
		$this->middleware('auth');
		
	}

    public function index()
    {
    	$this->data['gender'] = "female";
    	$save_data = $this->getSavedSmoji();
    	$this->data['save_smoji'] = $save_data;
    	return view('designer.savedsmoji', $this->data);
    }

    


	public function getSavedSmoji(){
    	
    	$user = auth()->user();
		$user_id = $user->id;
		$data = DB::table('my_smoji')->select('save_smoji_data')
	     ->where('user_id', '=', $user_id)->get();
	    return $data;
	}



}
