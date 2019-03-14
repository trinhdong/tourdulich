<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    protected $table = "hoadon";

    public function tour(){
    	return $this->hasMany('App\tour','idhoadon','id');
    }
    public function user(){
    	return $this->belongsTo('App\User','iduser','id');
    }
}
