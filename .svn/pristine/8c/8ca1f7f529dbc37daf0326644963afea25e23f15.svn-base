<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hr_emp_personal_details extends Model
{
    //
    protected $table="hr_emp_personal_details";

    public function company() {
    return $this->belongsTo('App\hr_company','company_id','id');
   }

       public function country() {
    return $this->belongsTo('App\country','nationality','id');
   }

       public function branch() {
    return $this->belongsTo('App\hr_branch','branch_id','id');
   }

       public function department() {
    return $this->belongsTo('App\hr_department','department_id','id');
   }

       public function designation() {
    return $this->belongsTo('App\hr_designation','designation_id','id');
    }

       public function attendance() {
    return $this->hasMany('App\attendance','user_id','staffId');
  }
       public function leave() {
    return $this->hasMany('App\hr_leave','user_id','user_id');
   }

}
