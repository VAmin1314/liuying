<?php
/**
 * 前台的路由文件
 */
Route::group(['namespace' => 'Home'], function () {
    Route::get('/', 'IndexController@index');
});


/**
 * 后台的路由文件
 */
Route::get('/backend/login', 'Admin\LoginController@index');
Route::post('/backend/login', 'Admin\LoginController@login');

$admin = [
    'namespace' => 'Admin',
    'prefix' => '/backend',
    'middleware' => 'admin'
];

Route::group($admin, function () {
    Route::get('/', 'IndexController@index');

    Route::get('/photoList', 'PhotoController@index');
    Route::get('/issuePhoto', 'PhotoController@issuePhoto');
    Route::get('/editPhoto/{id}', 'PhotoController@editPhoto');
    Route::post('/editPhoto/{id}', 'PhotoController@saveEditPhoto');
    Route::post('/issuePhoto', 'PhotoController@savePhoto');
    Route::post('/getPhoto', 'PhotoController@getPhoto');
    Route::post('/delPhoto', 'PhotoController@delPhoto');

    // 退出登录
    Route::get('/logout', 'LoginController@logout');
});

