<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dongtour extends Model
{
    protected $table = "dongtour";

    public function tour(){
    	return $this->hasMany('App\tour','iddongtour','id');
    }
}
