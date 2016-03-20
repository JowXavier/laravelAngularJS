<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function angular()
    {
	    $posts = \App\Post::all();
	    return view('posts.index', compact('posts'));
    }

    public function index()
    {
	    return \App\Post::all();
    }
}
