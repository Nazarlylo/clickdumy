<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

//Route::group(['middleware' => ['web']], function () {
//
//    });
//});
    Route::group(['middleware' => 'web'], function () {
        Route::auth();
        Route::get('/editusers/{id}', 'UserController@editUsers');
        Route::any('/update/{id}', 'UserController@update');
        Route::get('/click-dummy/create', 'ClickdumyController@create');
		Route::get('/', 'HomeController@index');
        Route::post('/click-dummy', 'ClickdumyController@store');
		Route::any('/click-dummy/update/{id}', 'ClickdumyController@update');
		Route::any('/click-dummy/delete/{id}', 'ClickdumyController@delete');
        Route::get('/click-dummy', 'ClickdumyController@index');
        Route::any('/click-dummy/upload_img', 'ClickdumyController@multiple_upload');
        Route::get('/click-dummy/{id}/edit', 'ClickdumyController@edit');
       // Route::get('/click-dummy/{id}', 'ClickdumyController@show');
		Route::get('/click-dummy', ['middleware' => 'auth.basic','uses'=>'ClickdumyController@index']);
		Route::get('/click-dummy/{id}', ['middleware' => 'auth.post','uses'=>'ClickdumyController@show'
		]);
    });


