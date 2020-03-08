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

                $view->with('totalSaved', $users_count);
            }
        });

    }



}
