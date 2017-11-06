<?php
/**
 * Created by PhpStorm.
 * User: Developer1
 * Date: 06-10-2017
 * Time: 16:01
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hr_shift extends Model
{
 	use SoftDeletes;  
    protected $dates = ['deleted_at'];     
}
