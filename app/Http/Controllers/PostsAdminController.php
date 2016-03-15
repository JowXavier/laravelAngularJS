<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;

class PostsAdminController extends Controller
{	

	/**
	 * Inicializa o post
	 * @var class
	 */
	private $post;

	/**
	 * Criando um dependence injection
	 * @param Post $post atribui a classe na váriavel post
	 */
	public function __construct(Post $post)
	{
		$this->post = $post;
	}

	/**
	 * Lista todos os posts
	 * @return array envia para view
	 */
    public function index()
    {
    	$posts = $this->post->paginate(10);
    	return view('admin.posts.index', compact('posts'));
    }

    /**
     * Formulário 
     * @return [type] view 
     */
    public function create()
    {
    	return view('admin.posts.create');
    }

    /**
     * Grava os dados do formulário 
     * @return [type] view 
     */
    public function insert(Request $request)
    {
	    $this->validate($request, [
	        'title' => 'required|min:8',
	        'content' => 'required',
	    ]);

        $post = $this->post->create($request->except('tags'));
        $post->tags()->sync($this->getTagsIDs($request->tags));

        return redirect()->route('admin.posts.index'); 	
    }

   	/**
     * Formulário 
     * @return [type] view 
     */
    public function edit($id)
    {
    	$post = $this->post->find($id);
    	return view('admin.posts.edit', compact('post'));
    }

    /**
     * Grava os dados do formulário 
     * @return [type] view 
     */
    public function update($id, Request $request)
    {
	    $this->validate($request, [
	        'title' => 'required|min:8',
	        'content' => 'required',
	    ]);

    	
        $this->post->find($id)->update($request->except('tags'));

        $post = $this->post->find($id);
        $post->tags()->sync($this->getTagsIDs($request->tags));

    	return redirect()->route('admin.posts.index'); 	
    }

    /**
     * Apaga 
     * @return [type] view 
     */
    public function delete($id)
    {
    	$this->post->find($id)->delete($id);
    	return redirect()->route('admin.posts.index'); 	
    }

    private function getTagsIDs($tags) 
    {
        $tagList = array_filter(array_map('trim', explode(',', $tags)));
        $tagsIDs = [];
        foreach ($tagList as $tagName) {
            $tagsIDs[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }

        return $tagsIDs;
    }
}
