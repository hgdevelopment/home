<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class hr_branch extends Model
{
	use SoftDeletes;
	protected $table="hr_branch";
  	protected $dates = ['deleted_at'];

}
