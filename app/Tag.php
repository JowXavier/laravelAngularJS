<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = [
				'name'
	];

    public function posts()
    {
    	return $thid->belongsToMany('App\Post', 'posts_tags');
    }
}
