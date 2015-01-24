<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

if ( Auth::check() ) {
	View::share('authUser', Auth::user());
}

// Queues
Route::post('queue/receive', function()
{
	return Queue::marshal();
});

Route::get('/', [ 'as' => 'create', 'uses' => 'Dyryme\Controllers\LinkController@create', ]);
Route::post('store', [ 'as' => 'store', 'before' => 'csrf', 'uses' => 'Dyryme\Controllers\LinkController@store', ]);
Route::get('screenshot/{id}', [ 'as' => 'screenshot', 'uses' => 'Dyryme\Controllers\LinkController@screenshot', ]);

Route::get('looper', [ 'as' => 'loop_detected', 'uses' => 'Dyryme\Controllers\LinkController@looper', ]);

// Authenticated link routes
Route::group([ 'prefix' => 'link', 'before' => 'auth', ], function ()
{
	Route::get('list', [ 'as' => 'list', 'uses' => 'Dyryme\Controllers\LinkController@index', ]);
	Route::delete('{id}', [ 'as' => 'link.destroy', 'before' => 'auth|csrf', 'uses' => 'Dyryme\Controllers\LinkController@destroy', ]);
	Route::put('{id}', [ 'as' => 'link.activate', 'before' => 'auth|csrf', 'uses' => 'Dyryme\Controllers\LinkController@activate', ]);
	Route::get('{id}/hits', [ 'as' => 'link.hits', 'uses' => 'Dyryme\Controllers\LinkController@hits', ]);
});

// Authentication routes
Route::get('login', [ 'as' => 'login', 'uses' => 'Dyryme\Controllers\AuthController@login', ]);
Route::post('login', [ 'as' => 'authenticate', 'before' => 'csrf', 'uses' => 'Dyryme\Controllers\AuthController@authenticate', ]);
Route::get('logout', [ 'as' => 'logout', 'uses' => 'Dyryme\Controllers\AuthController@logout', ]);

// Registration routes
Route::get('register', [ 'as' => 'register', 'uses' => 'Dyryme\Controllers\RegistrationController@create', ]);
Route::post('register', [ 'as' => 'register', 'before' => 'csrf', 'uses' => 'Dyryme\Controllers\RegistrationController@store', ]);

// User routes
Route::get('links', [ 'as' => 'user.links', 'uses' => 'Dyryme\Controllers\UserController@links', ]);
Route::get('denied', [ 'as' => 'user.denied', 'uses' => 'Dyryme\Controllers\UserController@denied', ]);

// Wildcard redirect routes
Route::get('{hash}', [ 'as' => 'redirect', 'uses' => 'Dyryme\Controllers\LinkController@redirect', ]);
