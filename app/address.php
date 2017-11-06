<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    //
    public function country() {
    return $this->belongsTo('App\Country','Country','id');
   }
}
