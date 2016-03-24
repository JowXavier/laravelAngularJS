<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Post extends Model
{
	protected $guarded = ['id'];
    protected $fillable = [
        'title',
        'content'
    ];

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag', 'posts_tags');
    }

    public function getTagListAttribute()
    {	
    	$tags = $this->tags()->lists('name')->all();
    	return implode(', ', $tags);
    }
}
