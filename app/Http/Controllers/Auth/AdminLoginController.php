<?php

/*namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    
}*/

/*namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;*/

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;	
class AdminLoginController extends Controller
{
    /**
     * Show the application’s login form.
     *
     * @return \Illuminate\Http\Response
     */
   
    protected function guard(){

        return Auth::guard('admin');
    }
    
    //use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/admin/dashboard';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');

    }

    public function showLoginForm()
	{
		
	    return view('admin.login');
	}

	public function login(Request $request)
    {	

    	$validator = Validator::make($request->all(), [
         	'email'   => 'required|email',
            'password' => 'required'
        ]);
        $input = $request->all();

        if ($validator->passes()) { 

        	if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password ])) {
        		//return redirect()->intended('admin/dashboard');
        		return redirect('admin/dashboard');
	            dd(auth()->guard('admin')->user());
	            
	        }
	        return back()->withErrors(['email' => 'Email or password are wrong.']);

        }else{
            return redirect()->back()->withErrors($validator);
        }

    }

    public function logout()
	{
		auth()->guard('admin')->logout();
		return redirect('admin/login');
	    //return view('admin.login');
	}
    


}