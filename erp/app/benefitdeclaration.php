<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class benefitdeclaration extends Model
{

    public function tcnmaster()
    {
        return $this->belongsTo('App\tcnmaster','tcnType','id');
    }

}
