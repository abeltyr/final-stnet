<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Aut;
class Admin extends Aut
{
   
    protected $guard = 'admin';

    protected $fillable = [
        'firstname','lastname', 'email', 'password','phone','avatar',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
