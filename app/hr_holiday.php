<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hr_holiday extends Model
{


    use SoftDeletes;
    protected $table="hr_holidays";

   
}
