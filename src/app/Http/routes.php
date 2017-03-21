<?php

/*
|-------------------------------------------------------------------------------
|   Application Routes
|-------------------------------------------------------------------------------
*/
Route::get('/', ['as' => 'Front:Index', 'uses' => 'MediaController@listAudio']);


/*
|-------------------------------------------------------------------------------
|   Tracks Properties manipulation Routes
|-------------------------------------------------------------------------------
*/
Route::get('/{hash}',               ['as' => 'Media:Play',  'uses' => 'MediaController@mediaPlay'])
    ->where(['hash' => '[0-9a-f]+']);

Route::get('/{hash}/play',          ['as' => 'Media:Play',  'uses' => 'MediaController@mediaPlay'])
    ->where(['hash' => '[0-9a-f]+']);

Route::post('rate/{hash}/{rate}',   ['as' => 'Media:Rate',  'uses' => 'MediaController@mediaRate'])
    ->where(['hash' => '[0-9a-f]+', 'rate' => '(dis)?like']);


/*
|-------------------------------------------------------------------------------
|   Backend Routes
|-------------------------------------------------------------------------------
*/
Route::get('login',     ['as' => 'Auth:LoginForm',  'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('login',    ['as' => 'Auth:Login',      'uses' => 'Auth\AuthController@login']);
Route::get('logout',    ['as' => 'Auth:Logout',     'uses' => 'Auth\AuthController@logout']);

Route::post('password/email',           'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset',           'Auth\PasswordController@reset');
Route::get('password/reset/{token?}',   'Auth\PasswordController@showResetForm');

Route::get('register',  ['as' => 'Auth:RegistrationForm',   'uses' => 'Auth\AuthController@showRegistrationForm']);
Route::post('register', ['as' => 'Auth:Register',           'uses' => 'Auth\AuthController@register']);


/*
|-------------------------------------------------------------------------------
|   Cabinet Routes
|-------------------------------------------------------------------------------
*/
Route::get('/home', ['as' => 'Cabinet:Index', 'uses' => 'HomeController@index']);


/*
|-------------------------------------------------------------------------------
|   AJAX Routes
|-------------------------------------------------------------------------------
*/
Route::get('/{hash}/meta',  ['as' => 'Meta:get',    'uses' => 'AjaxController@getMeta'])
    ->where(['hash' => '[0-9a-f]+']);

Route::post('/{hash}/meta', ['as' => 'Meta:update', 'uses' => 'AjaxController@updateMeta'])
    ->where(['hash' => '[0-9a-f]+']);

