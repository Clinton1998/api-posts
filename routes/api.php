<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
	'prefix' => 'v1',
	'namespace' => 'Api\V1',
	//'middleware' => ['auth:api']
],function(){
	Route::apiResources([
		'posts' => 'PostController',
		'users' => 'UserController',
		'comments' => 'CommentController'
	]);
	Route::get('posts/{post}/relationships/author','PostRelationShipController@author')->name('posts.relationships.author');

	Route::get('posts/{post}/author','PostRelationShipController@author')->name('posts.author');

	Route::get('post/{post}/relationships/comments','PostRelationShipController@comments')->name('posts.relationships.comments');

	Route::get('post/{post}/comments','PostRelationShipController@comments')->name('posts.comments');


});

Route::post('login','Api\AuthController@login');
Route::post('signup','Api\AuthController@signup');