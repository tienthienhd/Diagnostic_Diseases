<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    protected $table = "feedback";
    protected $primaryKey = 'id';
    protected $fillable = array(
    	'symptoms',
    	'diseases',
    	'evaluation'
    );

    public $timestamps = false;

}
