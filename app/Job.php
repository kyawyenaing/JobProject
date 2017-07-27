<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $table = "jobs";
    public function category() {
      return $this->belongsTo('App\Category');
    }
    public function city() {
    	return $this->belongsTo("App\City");
    }
    public function company() {
    	return $this->belongsTo("App\Company");
    }
    public function salary() {
    	return $this->belongsTo("App\Salary");
    }

}
