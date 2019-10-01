<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'email', 'body', 'author',
    ];


    public function replies(){
        return $this->hasMany(CommentReply::class);
    }
}
