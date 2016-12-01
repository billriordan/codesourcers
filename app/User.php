<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name', 'email', 'password', 'is_admin', 'upvotes', 'downvotes', 'confirmation_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function threads()
    {
        return $this->hasMany('App\Thread');
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
