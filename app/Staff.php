<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $guard = 'schstaff';
    protected $table = 'staffs';
}
