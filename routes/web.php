<?php
/**
 * 前台的路由文件
 */
Route::group(['namespace' => 'Home'], function () {
    Route::get('/', 'IndexController@index');
});

// 获取音乐列表
Route::post('/getMusicList', 'Api\MusicController@index');

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

    // 图片

    Route::resource('/photo', 'PhotoController');
    Route::resource('/password', 'PasswordController');
    // Route::get('/photoList', 'PhotoController@index');
    // Route::get('/issuePhoto', 'PhotoController@issuePhoto');
    // Route::get('/editPhoto/{id}', 'PhotoController@editPhoto');
    // Route::post('/editPhoto/{id}', 'PhotoController@saveEditPhoto');
    // Route::post('/issuePhoto', 'PhotoController@savePhoto');
    // Route::post('/getPhoto', 'PhotoController@getPhoto');
    // Route::post('/delPhoto', 'PhotoController@delPhoto');

    // 音乐
    Route::get('/musicList', 'MusicController@index');
    Route::get('/issueMusic', 'MusicController@issueMusic');
    Route::get('/editMusic/{id}', 'MusicController@editMusic');
    Route::post('/editMusic/{id}', 'MusicController@saveEditMusic');
    Route::post('/issueMusic', 'MusicController@saveMusic');
    Route::post('/getMusic', 'MusicController@getMusic');
    Route::post('/delMusic', 'MusicController@delMusic');


    // 设置
    Route::get('/setting', 'SettingController@index');
    Route::post('/setting', 'SettingController@saveSetting');

    // 退出登录
    Route::get('/logout', 'LoginController@logout');
});

