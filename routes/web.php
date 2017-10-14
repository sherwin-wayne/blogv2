<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['web']], function(){

	Route::get('blog/{slug}', ['as'=> 'blog.single', 'uses'=>'BlogController@getSingle'])
		->where ('slug', '[\w\d\-\_]+');
	Route::get('blog',['uses'=> 'BlogController@getIndex', 'as'=>'blog.index']);
	Route::get('contact', 'PagesController@getContact');
    Route::post('contact', 'PagesController@postContact');	
	Route::get('about', 'PagesController@getAbout');
	Route::get('/', 'PagesController@getIndex');
	Route::resource('posts', 'PostController');

    //Authentication Routes
	Auth::routes();
	Route::get('/', 'PagesController@getIndex');
	Route::get('/admin', 'AdminController@index');

	//Categories, Tags Routes
	Route::resource('categories', 'CategoryController', ['except'=>['create']]);
	Route::resource('tags', 'TagController', ['except' => ['create']]);
	
	//Comments Routes
	Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
	Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
	Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
	Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
	Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);


	// Password Reset Routes-> this is giving me some problem with the Password Reset Form not pulling up properly after the pw email was received. The following routes were meant to work for 5.2 version only
	
	// Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
	// Route::post('password/email', 'Auth\ResetPasswordController@sendResetLinkEmail');
	// Route::post('password/reset', 'Auth\ResetPasswordController@reset');



});