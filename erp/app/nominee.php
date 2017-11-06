<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nominee extends Model
{
    //
    public function address() {
    return $this->belongsTo('App\Address','addressId','id');
   }
   public function proof() {
    return $this->belongsTo('App\Proofs','proofId','id');
   }
   // public function getdobAttribute($value){
   //  	return date('d-m-Y',strtotime($value));
   //  }
   // public function setdobAttribute($value){
   //    return date('Y-m-d',strtotime($value));
   //  }

    // public function setDobAttribute($value){
    //   return date('Y-m-d',strtotime($value));
    // }
}
