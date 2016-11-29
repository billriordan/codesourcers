<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function thread()
    {
    	return $this->belongsTo('App\Thread');
    }
}
