<?php

Route::group(['namespace' => 'Hazzard\Comments\Http\Controllers'], function ($router) {

    // Admin routes.

    $router->get('comments/admin/settings', [
        'as' => 'comments.admin.settings',
        'uses' => 'AdminSettingsController@index',
    ]);

    $router->put('comments/admin/settings', [
        'as' => 'comments.admin.settings',
        'uses' => 'AdminSettingsController@update',
    ]);

    $router->get('comments/admin', [
        'as' => 'comments.admin.index',
        'uses' => 'AdminDashboardController@index',
    ]);

    $router->get('comments/admin/{id}', [
        'as' => 'comments.admin.show',
        'uses' => 'AdminDashboardController@show',
    ]);

    $router->put('comments/admin/{id?}', [
        'as' => 'comments.admin.update',
        'uses' => 'AdminDashboardController@update',
    ]);

    $router->delete('comments/admin/{id}', [
        'as' => 'comments.admin.destroy',
        'uses' => 'AdminDashboardController@destroy',
    ]);

    // Moderator routes.

    $router->get('comments/moderator/{board_id}', [
        'as' => 'comments.moderator.index',
        'uses' => 'ModeratorDashboardController@index'
    ]);

    $router->put('comments/moderator/{board_id}/{id?}', [
        'as' => 'comments.moderator.update',
        'uses' => 'ModeratorDashboardController@update',
    ]);

    $router->delete('comments/moderator/{board_id}/{id}', [
        'as' => 'comments.moderator.destroy',
        'uses' => 'ModeratorDashboardController@destroy',
    ]);

    // Comments routes.

    $router->resource('comments', 'CommentsController', ['only' => ['index', 'store', 'update']]);

    $router->post('comments/{id}/vote', [
        'as' => 'comments.vote',
        'uses' => 'CommentsController@vote',
    ]);
});
