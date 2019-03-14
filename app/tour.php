<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tour extends Model
{
    protected $table = "tour";

    public function hoadon(){
        return $this->hasMany('App\User','idtour','id');
    }
    public function dongtour(){
    	return $this->belongsTo('App\dongtour','iddongtour','id');
    }
    public function noiden()
    {
        return $this->belongsTo('App\noiden','idnoiden','id');
    }
    // public function chitiettour(){
    // 	return $this->hasMany('App\chitiettour','idtour','id');
    // }
    // public function phuongtien(){
    //     return $this->hasManyThrough('App\chitiettour','App\phuongtien','idtour','idchitiettour','id');
    // }
    // public function khachsan(){
    //     return $this->hasManyThrough('App\chitiettour','App\khachsan','idtour','idchitiettour','id');
    // }
    // public function diadiem(){
    //     return $this->hasManyThrough('App\chitiettour','App\diadiem','idtour','idchitiettour','id');
    // }
}