<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class generateincentive extends Model
{
    //
    protected $table="generateincentives";
    public function incentiveReports() {
    return $this->hasMany('App\IncentiveReports','generated_id','id');
   }
}
