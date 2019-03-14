<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitiettour extends Model
{

    protected $table = "chitiettour";

    public function tour(){
    	return $this->belongsTo('App\tour','idtour','id');
    }
    public function phuongtien(){
    	return $this->hasMany('App\phuongtien','idchitiettour','id');
    }
    public function diadiem(){
    	return $this->hasMany('App\diadiem','idchitiettour','id');
    }
    public function khachsan(){
    	return $this->hasMany('App\khachsan','idchitiettour','id');
    }
}
