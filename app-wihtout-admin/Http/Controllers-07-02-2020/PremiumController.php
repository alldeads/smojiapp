<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use Validator;
use DB;
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
        $user = auth()->user();
        $user_id = $user->id;
        $result = DB::table('users')->select('*')
         ->where('id', '=', $user_id)->get();
         
        $data['name'] = $result[0]->name;
        $data['plan'] = $result[0]->stripe_id;
        $data['user_email'] = $result[0]->email;
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
