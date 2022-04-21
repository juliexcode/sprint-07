<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::creating(function($comment){
    //        $comment->user_id =auth()->id();
    //     });
    // }
    public function commentable()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function user()
    {
        return $this->belongsto('App\Models\User');
    }
}
