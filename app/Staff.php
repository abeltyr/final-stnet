<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Aut;

class Staff extends Aut
{
    protected $guard = 'schstaff';
    protected $table = 'staffs';
}
