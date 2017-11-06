<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hr_company extends Model
{
	use SoftDeletes;
	protected $table="hr_companies";
  	protected $dates = ['deleted_at'];

}
