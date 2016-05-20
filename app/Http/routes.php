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

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'AngularController@serveApp');

    Route::get('/unsupported-browser', 'AngularController@unsupported');

});

//public API routes
$api->group(['middleware' => ['api']], function ($api) {

    // Authentication Routes...
    $api->post('auth/login', 'Auth\AuthController@login');
    $api->post('auth/register', 'Auth\AuthController@register');

    // Password Reset Routes...
    $api->post('auth/password/email', 'Auth\PasswordResetController@sendResetLinkEmail');
    $api->get('auth/password/verify', 'Auth\PasswordResetController@verify');
    $api->post('auth/password/reset', 'Auth\PasswordResetController@reset');

    //Group api
    $api->post('group/create', 'GroupController@create');

    //question api
    $api->post('question/index', 'QuestionController@index');
    $api->post('question/create', 'QuestionController@create');

    //menu api
    $api->post('menu/getStatus', 'MenuController@getStatus');

    //activity api
    $api->post('activity/', 'ActivityController@index');
    $api->post('activity/create', 'ActivityController@create');
    $api->post('activity/update', 'ActivityController@update');
    $api->post('activity/delete', 'ActivityController@delete');

    //evaluate api
    $api->post('evaluate/create', 'EvaluateController@create');
    
});

//protected API routes with JWT (must be logged in)
$api->group(['middleware' => ['api', 'api.auth']], function ($api) {

});
