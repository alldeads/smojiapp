<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;
use Validator;  
use App\Rules\MatchOldPassword;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $referrak_data = $this->getreferraldata();
        $this->data['referrak_data'] = $referrak_data;
        return view('admin.dashboard', $this->data);
    }


    public function showChangePasswordForm()
    {
        
        return view('admin.changepassword');
    }

    public function submitform(Request $request)
    {   

        $request->validate([
            'currentPassword' => ['required', new MatchOldPassword],
            'newPassword' => ['required'],
            'newPassword_confirmation' => ['same:newPassword'],
        ]);
        
        //User::find(auth()->guard('admin')->user())->update(['password'=> Hash::make($request->new_password)]);
        $admin_id = auth()->guard('admin')->user()->id;
        DB::table('admins')->where('id', $admin_id)->update(
                        [   'password' => Hash::make($request->newPassword) ]);

        return back()->with('success','Password change successfully.');
        //dd('Password change successfully.');

   /*     $validator = Validator::make($request->all(), [
            'current-password'   => 'required',
            'new-password' => 'required',
            'new-password_confirmation' => 'required'
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
        }*/

    }


    public function getreferraldata(){
        
        $user = auth()->user();
        $user_id = $user->id;
        $data = DB::table('users as u')->select('u.fname','u.lname','u.name','u.email','u.referralcode','u.reference_referral_code','u.created_at','u2.name as reference_name','u2.referralcode as reference_referralcode','u2.email as reference_email')
         ->join('users as u2', 'u2.referralcode', '=', 'u.reference_referral_code')
         ->where('u.reference_referral_code', '!=', '')->get();
        return $data;
    }

}