<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $with = ['author', 'category', 'comments'];
    protected $guarded = [];
    
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

/**
 * When a post is deleted, delete all of its comments
 */
    public static function boot()
    {
        parent::boot();
        static::deleting(function($post){
            foreach($post->comments as $comment){
                $comment->delete();
            }
        });
        
    }
}
