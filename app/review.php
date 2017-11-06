<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class review extends Model
{
  
   protected $table="hr_attendance_review";

   public function staff()
    {
        return $this->hasOne('App\hr_emp_personal_details','user_id','staffId');
    }
     
}