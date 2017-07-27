<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table = 'companies';
    public function category() {
      return $this->belongsTo('App\Category');
    }
    public function image() {
    	return $this->belongsTo('App\Image');
    }
    public function job() {
    	return $this->hasOne('App\Job');
    }
    public function city() {
        return $this->belongsTo('App\City');
    }
}
