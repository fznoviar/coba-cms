<?php

// \Route::match(
//     ['GET', 'POST'],
//     cmsLoginUrl(),
//     [
//         'middleware' => 'admin.guest',
//         'as' => cmsRouteName('login'),
//         'uses' => 'SessionController@login'
//     ]
// );

// \Route::group(['prefix' => config('cms.prefix_url'), 'middleware' => 'admin.auth'], function () {
\Route::group(['prefix' => config('cms.prefix_url')], function () {
    // ElFinder
    // \Route::get(
    //     'elfinder',
    //     [
    //         'as' => cmsRouteName('elfinder'),
    //         'uses' => '\Barryvdh\Elfinder\ElfinderController@showTinyMCE4'
    //     ]
    // );

    Route::get('/', [
        'as' => cmsRouteName('index'),
        'uses' => 'DashboardController@index'
    ]);
    Route::resource('template', 'TemplateController', ['only' => ['index', 'create', 'edit']]);
    // \Route::match(['GET', 'POST'], '/change-password', ['as' => cmsRouteName('password'),
                                     // 'uses' => 'SessionController@changePassword']);
    // \Route::get('/logout', ['as' => cmsRouteName('logout'),
                                            // 'uses' => 'SessionController@logout']);

    // \Route::resource('pages', 'PageController', ['except' => 'show']);
    \Route::resource('users', 'UserController', ['except' => 'show']);

    //Template Route
    // \Route::get(
    //     'template/list',
    //     [
    //         'as' => cmsRouteName('template.list'),
    //         'uses' => 'HtmlTemplateController@templateList'
    //     ]
    // );
    // \Route::get(
    //     'template/{key}',
    //     [
    //         'as' => cmsRouteName('template.detail'),
    //         'uses' => 'HtmlTemplateController@template'
    //     ]
    // );
});
