<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaitour extends Model
{
    protected $table = "loaitour";

    public function noiden(){
    	return $this->hasMany('App\noiden','idloaitour','id');
    }
    public function tour(){
    	return $this->hasManyThrough('App\tour','App\noiden','idloaitour','idnoiden','id');
    }
}
