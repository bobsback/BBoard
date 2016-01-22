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

/*binding*/

Route::bind('boardname',function ($slug)
{
    return App\Board::where('boardname',$slug)->first();

});

/*page routing*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Build', 'BoardController@create');

Route::get('/about', function () {
    return view('about');
});

Route::get('board', 'BoardController@index');
Route::get('board/{boardname}', 'BoardController@show');


patch('board/{boardname}', 'BoardController@update');

/*generate new board*/

get('build', 'BoardController@create');

get('board/{boardname}/authorize', ['as' => 'board.authorize', 'uses' => 'BoardController@getAuthorize']);

post('board/{boardname}/authorize', ['as' => 'board.authorize.post', 'uses' => 'BoardController@postAuthorize']);

post('board/access-via-pincode', ['as' => 'board.access-via-pincode', 'uses' => 'BoardController@accessViaPincode']);

get('board/{boardname}/save', ['as' => 'board.save', 'uses' => 'BoardController@save']);

Route::post('build','BoardController@store');

/*Route delete board. Note: currently not working :(*/

$router->resource('board','BoardController', [
   'only'=>['destroy']

]);

/*Routes Home to Board. Note: Need to look at auth middleware to reroute to Board or redirect to previous page*/

Route::get('home', 'BoardController@index');

Route::get('/about', function () {
    return view('about');
});
Route::get('/enter', function () {
    return view('enter');
});

/*contact form*/
Route::get('contact',
    ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::post('contact',
    ['as' => 'contact_store', 'uses' => 'AboutController@store']);
/*Refer your boss*/
Route::post('referboss', ['as' => 'referboss', 'uses' => 'ReferController@store']);