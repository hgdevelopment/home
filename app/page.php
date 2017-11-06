<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class page extends Model
{
    //
     public function parent()
    {
        return $this->belongsTo('App\page', 'parent_id','id');
    }

    public function children()
    {
        return $this->hasMany('App\page', 'parent_id');
    }
}
