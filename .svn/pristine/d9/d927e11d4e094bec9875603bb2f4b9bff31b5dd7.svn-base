<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tcnrequest extends Model
{
  protected $table = 'tcnrequests';

    //
    public function country() {
    return $this->belongsTo('App\country','applyingFrom','id');
   }
    public function tcn() {
    return $this->belongsTo('App\tcnmaster','tcn_id','id');
   }
   public function nominee_one() {
    return $this->belongsTo('App\nominee','nominee1_id','id');
   }
   public function nominee_two() {
    return $this->belongsTo('App\nominee','nominee2_id','id');
   }
   public function benefit() {
    return $this->belongsTo('App\bank','benefitId','id');
   }
   public function member() {
    return $this->hasOne('App\memberregistration','userId','userId');
   }
   public function heeraaccount() { 
    return $this->belongsTo('App\bank','heeraAccountId','id');
   }
   public function paymentdetails() {
    return $this->belongsTo('App\paymentdetails','paymentId','id');
   }
  use SoftDeletes;

  protected $dates = ['deleted_at'];
}
