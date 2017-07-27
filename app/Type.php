<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    public function job() {
    	return $this->hasOne('App\Job');
    }
}
