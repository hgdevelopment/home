<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bank extends Model
{
  public function getTypeOfAccountAttribute($value)
  {
    return strtoupper($value);
  }
    public function country()
   {
    return $this->belongsTo('App\country','country','id');
   }
   public function tcnmaster()
   {
    return $this->belongsTo('App\tcnmaster','userId','tcnType');
   }
  use SoftDeletes;
  protected $table = 'banks';
  protected $dates = ['deleted_at'];
}


