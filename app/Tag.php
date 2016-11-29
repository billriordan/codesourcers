<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function thread()
    {
<<<<<<< HEAD
    	return $this->belongsToMany('App\Thread')->withPivot('tag_id');
=======
    	return $this->belongsTo('App\Thread');
>>>>>>> c74ed89ad537d158368b88ca49c1bb7b48e6fa02
    }
}
