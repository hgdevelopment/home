<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class attendance extends Model
{
protected $table = 'hr_attendance';


    public function shift() {
    return $this->belongsTo('App\hr_shift','shift','id');
   }

}