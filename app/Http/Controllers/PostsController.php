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

    public function store(Request $request)
    {
        return Post::create($request->all());
    }

    public function show($id)
    {
        return Post::find($id);
    }

    public function update($id, Request $request)
    {
        if (Post::find($id)->update($request->all())) {
            return json_encode(array('message' => 'success'));
        }        
    }

    public function destroy($id)
    {   
        if (Post::find($id)->delete($id)) {
            return json_encode(array('message' => 'success'));
        } 
    }
}
