<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Aut;
class Admin extends Aut
{
   
    protected $guard = 'admin';

    protected $fillable = [
        'fname','lname', 'email', 'phone',
    ];
 
    protected $hidden = [
        'password', 'remember_token',
    ];

}
