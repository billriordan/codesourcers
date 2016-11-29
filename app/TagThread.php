<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagThread extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tag_thread';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'thread_id', 'tag_id'
    ];

    public function thread()
    {
        return $this->belongsTo('App\Thread');
    }
    public function tag()
    {
        return $this->hasOne('App\Tag');
    }

}
