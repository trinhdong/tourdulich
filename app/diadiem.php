<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diadiem extends Model
{
    protected $table = "diadiem";

    public function chitiettour(){
    	return $this->belongsTo('App\chitiettour','idchitiettour','id');
    }
}
