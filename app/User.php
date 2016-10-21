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

    public function stars($upvotes, $downvotes)
    {
        
        //value from 0 to 
        if($upvotes == 0)
                $upvotes = 3;
        if($downvotes == 0)
                $downvotes = 1;

            $percent = $upvotes / $downvotes;
        switch($percent)
        {
            case ($percent <= 0): 
                            return [
                            1 => "fa fa-star-o",
                                    ];
                break;
            case ($percent < .0625):
                            return [
                            1 => "fa fa-star-half-empty",
                                    ];
                break;
            case ($percent < .125):
                            return [
                            1 => "fa fa-star",
                                    ];
                break;
            case ($percent < 0.25):
                            return [
                            1 => "fa fa-star",
                            2 => "fa fa-star-half-empty",
                                    ];
                break;
            case ($percent < 0.5):
                            return [
                            1 => "fa fa-star",
                            2 => "fa fa-star",
                                    ];
                break;
            case ($percent <= 1.5):
                            return [
                            1 => "fa fa-star",
                            2 => "fa fa-star",
                            3 => "fa fa-star-half-empty",
                                    ]; 
            case ($percent < 2):
                            return [
                            1 => "fa fa-star",
                            2 => "fa fa-star",
                            3 => "fa fa-star",
                                    ];
                break;
            case ($percent < 4):
                            return [
                            1 => "fa fa-star",
                            2 => "fa fa-star",
                            3 => "fa fa-star",
                            4 => "fa fa-star-half-empty",
                                    ];
                break;
            case ($percent < 8):
                            return [
                            1 => "fa fa-star",
                            2 => "fa fa-star",
                            3 => "fa fa-star",
                            4 => "fa fa-star",
                                    ];
                break;
            case ($percent < 16):
                            return [
                            1 => "fa fa-star",
                            2 => "fa fa-star",
                            3 => "fa fa-star",
                            4 => "fa fa-star",
                            5 => "fa fa-star-half-empty",
                                    ];
                break;
            case ($percent > 32): 
                            return [
                            1 => "fa fa-star",
                            2 => "fa fa-star",
                            3 => "fa fa-star",
                            4 => "fa fa-star",
                            5 => "fa fa-star",
                                    ];

            default: 
                            return [
                            1 => "fa fa-star",
                            2 => "fa fa-star",
                            3 => "fa fa-star-half-empty",
                                    ];
        }
    }
}
