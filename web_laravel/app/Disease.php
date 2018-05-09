<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $table = "disease";

    public function category(){
    	return $this->belongTo('App\Category', 'id_type', 'id');
    }
}
