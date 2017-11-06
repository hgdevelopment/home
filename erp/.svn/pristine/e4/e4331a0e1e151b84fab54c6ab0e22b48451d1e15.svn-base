<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class proofs extends Model
{
    
     public function getDateOfIssueAttribute($value){
    	return date('d-m-Y', strtotime($value));
    }
    // public function setDateOfIssueAttribute($value){
    //   return Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    // }
    public function getDateOfExpiryAttribute($value){
      return date('d-m-Y', strtotime($value));
    }
    // public function setDateOfExpiryAttribute($value){
    //  return Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    // }
}
