<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','PostsController@angular');

Route::controllers([
	'auth'     =>	'Auth\AuthController',
	'password' =>	'Auth\PasswordController'
]);

Route::post('oauth2/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::get('posts', ['as' => 'posts.index', 'middleware' => 'oauth', 'uses' => 'PostsController@index']);
Route::get('posts/{id}', ['as' => 'posts.show', 'uses' => 'PostsController@show']);
Route::post('posts', ['as' => 'posts.store', 'uses' => 'PostsController@store']);
Route::put('posts/{id}', ['as' => 'posts.update', 'uses' => 'PostsController@update']);
Route::delete('posts/{id}', ['as' => 'posts.destroy', 'uses' => 'PostsController@destroy']);

Route::group(['prefix' => 'admin', 'middleware' => 'oauth'], function() {

	Route::group(['prefix' => 'posts'], function() {

		Route::get('/', ['as' => 'admin.posts.index', 'uses' => 'PostsAdminController@index']);
		Route::get('create', ['as' => 'admin.posts.create', 'uses' => 'PostsAdminController@create']);
		Route::post('insert', ['as' => 'admin.posts.insert', 'uses' => 'PostsAdminController@insert']);
		Route::get('edit/{id}', ['as' => 'admin.posts.edit', 'uses' => 'PostsAdminController@edit']);
		Route::put('update/{id}', ['as' => 'admin.posts.update', 'uses' => 'PostsAdminController@update']);
		Route::get('delete/{id}', ['as' => 'admin.posts.delete', 'uses' => 'PostsAdminController@delete']);
	
	});	

});
