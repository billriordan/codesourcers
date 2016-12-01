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
        return $this->belongsTo('App\Tag');
    }
    
    public function rating($upvotes, $downvotes)
    {
        //return "fa fa-star-o";
        if($upvotes == 0)
            $upvotes++;
        if($downvotes == 0)
            $downvotes++;
        $percent = $upvotes /($upvotes + $downvotes);
        if($percent <= 0.2)
            return "fa fa-battery-0";
        if($percent <= 0.4)
            return "fa fa-battery-1";
        if($percent <= 0.6)
            return "fa fa-battery-2";
        if($percent <= 0.8)
            return "fa fa-battery-3";
        else
            return "fa fa-battery-4";
    }
}
