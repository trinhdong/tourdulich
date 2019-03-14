<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachsan extends Model
{
    protected $table = "khachsan";

    public function chitiettour(){
    	return $this->belongsTo('App\chitiettour','idchitiettour','id');
    }
}
