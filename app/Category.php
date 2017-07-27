<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model
{
    //
    // use Sluggable;
    protected $fillable = ['name_mm','name'];
    public function company(){
    	return $this->hasMany('App\Company');

    }
    public function job(){
    	return $this->hasOne('App\Job');
    }
}
