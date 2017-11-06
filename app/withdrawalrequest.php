<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class withdrawalrequest extends Model
{
    public function heeraaccount() {
    return $this->belongsTo('App\bank','heeraAccountId','id');
   }
}
