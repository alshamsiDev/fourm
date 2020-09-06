<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'threads';
    protected $fillable = ['title', 'body'];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    public function creator()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }
}
