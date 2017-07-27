<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //
    protected $fillable = ['name_mm'];
    public function job() {
    	return $this->hasOne('App\Job');
    }

}
