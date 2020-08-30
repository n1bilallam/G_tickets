<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded=[];
    
    public function path(){
        return "/projects/{$this->id}";
    }
    public function owner(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function addComment($body){
        return $this->comments()->create(compact('body'));
    }
}
