<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class School extends Authenticatable
{
    //
    protected $fillable = [
        'school_code','name', 'email','representative','address','no_student','school_owner','subscription','subscription_type','phone','avatar',
    ];

    protected $hidden = [
         'remember_token',
    ];


}
