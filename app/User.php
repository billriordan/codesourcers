<?php

namespace App;
use App\Thread;
use App\Comment;
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
        return $this->hasMany('App/Comment');
    }

    public function threads()
    {
        return $this->hasMany('App/Thread');
    }
}
