<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable = ['name_mm','name'];
    public function job() {
    	return $this->hasOne('App\Job');
    }
    public function company() {
    	return $this->hasOne('App\Company');
    }
}
