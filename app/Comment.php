<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'code_block', 'thread_id', 'comment_id', 'upvotes', 'downvotes',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'user_id',
    ];

    public function users()
    {
        return $this->belongsTo('App/User');
    }

    public function threads()
    {
        return $this->belongsTo('App/Thread');
    }

    public function comments()
    {
    	return $this->hasMany('App/Comment'); // not sure if this will even work
    }
}
