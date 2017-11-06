<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class benefitgeneration extends Model
{
    public function bank()
    {
        return $this->hasOne('App\bank','id','bankAccountId');
    }

    public function tcnmaster()
    {
        return $this->hasOne('App\tcnmaster','id','tcnType');
    }
}
