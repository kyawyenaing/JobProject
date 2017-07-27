<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $table = "images";

    public function company() {
      return $this->hasOne('App\Company','id');
    }
}
