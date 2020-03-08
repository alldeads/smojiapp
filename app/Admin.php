<?php

/*namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    
}*/



/**
 * Remove 'use Illuminate\Database\Eloquent\Model;'
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    use Notifiable;
// The authentication guard for admin
    protected $guard = 'admin';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'email', 'password',
    ];
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
//To set up the migration table for Admin, go to database/migration/***_create_admins_table.php and update the code with the following:
/*
{
    Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
    });
 }
//