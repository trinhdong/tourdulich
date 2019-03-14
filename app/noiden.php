<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class noiden extends Model
{
	protected $table = "noiden";

    public function tour(){
    	return $this->hasMany('App\tour','idnoiden','id');
    }
    public function loaitour(){
    	return $this->belongsTo('App\loaitour','idloaitour','id');
    }
}
