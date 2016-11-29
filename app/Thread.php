<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'code_block', 'start_date', 'end_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function tags()
    {
<<<<<<< HEAD
        return $this->belongsToMany('App\Tag')->withPivot('tag_id');
=======
        return $this->hasOne('App\Tag');
>>>>>>> c74ed89ad537d158368b88ca49c1bb7b48e6fa02
    }
}
