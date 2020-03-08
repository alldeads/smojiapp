<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        
        

        view()->composer('layouts.app', function($view)
        {
            $user = auth()->user();

            if($user){

                $user_id = $user->id;

                $users_count =    DB::table('my_smoji')
                ->where('user_id', '=', $user_id)
                ->where(function ($query) {
                    $query->where('gender', '=', 'male')
                          ->orWhere('gender', '=', 'female');
                })
                ->count();

                /* update is subsctiption is on */
                $last_date_sub = $user->last_date_sub;
                $current_date =  date('Y-m-d');
                if($last_date_sub != null){
                    if($last_date_sub < $current_date){
                        DB::table('users')->where('id', $user_id)->update(
                        [   
                            'is_subcription_on' => 'no'
                        ]);
                    }
                }
                /* update is subsctiption is on */

                $data = DB::table('my_smoji')->select('save_smoji_data')
                 ->where('user_id', '=', $user_id)->get();                  
                
                $data = json_decode(json_encode($data), true);
                if( isset($data) && !empty($data) ){
                    $decode_data_string = encrypt($data[0]['save_smoji_data']); 
                }else{
                    $decode_data_string = '';
                }
                $view->with(['totalSaved'=>$users_count,'jsondata'=> $decode_data_string]);
            }
        });

    }



}
