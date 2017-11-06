<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hr_deduction_master extends Model
{
	use SoftDeletes;  
    protected $table="hr_deduction_master";
    protected $dates = ['deleted_at'];
}
