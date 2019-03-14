<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phuongtien extends Model
{
    protected $table = "phuongtien";

    public function chitiettour(){
    	return $this->belongsTo('App\chitiettour','idchitiettour','id');
    }
}
