<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','content','author_id'];

    public function comments(){
    	return $this->hasMany(Comment::class);
    }

    public function author(){
    	return $this->belongsTo('App\User','author_id');
    }
}
