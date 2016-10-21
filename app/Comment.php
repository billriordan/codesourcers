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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function thread()
    {
        return $this->belongsTo('App\Thread');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function comment()
    {
        return $this->belongsTo('App\Comment');
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