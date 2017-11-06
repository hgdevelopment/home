<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class memberregistration extends Model
{ 
    
   public function country() {
    return $this->belongsTo('App\country','countryId','id');
   }
   public function address() {
    return $this->hasMany('App\address','userId','userId');
   }
   public function tcnmerge() {
    return $this->hasMany('App\tcnrequest','userId','userId');
   }
   public function proof() {
    return $this->belongsTo('App\proofs','userId','userId');
   }
   public function bank() {
    return $this->hasMany('App\bank','userId','userId');
   }
   use SoftDeletes;
   protected $table='memberregistrations';

    protected $dates = ['deleted_at'];
     

}
