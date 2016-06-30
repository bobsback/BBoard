<?php
use Illuminate\Support\Facades\App;

get('/bridge', function() {
    $pusher = App::make('pusher');

    $pusher->trigger( 'test-channel',
        'test-event',
        array('text' => 'Preparing the Pusher Laracon.eu workshop!'));

    return view('welcome');
});
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
    return App\Board::where('boardname',$slug)->firstOrFail();
});

/*page routing*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Build', 'BoardController@create');

Route::get('loginpls/{boardname}', 'BoardController@loginpls');
Route::get('regpls/{boardname}', 'BoardController@regpls');

Route::get('/about', function () {
    return view('about');
});

Route::get('board', 'BoardController@index');

patch('board/{boardname}', 'BoardController@update');



/*generate new board*/

get('build', 'BoardController@create');

get('board/{boardname}/authorize', ['as' => 'board.authorize', 'uses' => 'BoardController@getAuthorize']);

post('board/{boardname}/authorize', ['as' => 'board.authorize.post', 'uses' => 'BoardController@postAuthorize']);

post('board/access-via-pincode', ['as' => 'board.access-via-pincode', 'uses' => 'BoardController@accessViaPincode']);

get('board/{boardname}/save', ['as' => 'board.save', 'uses' => 'BoardController@save']);

Route::post('build','BoardController@store');

Route::get('board/{boardname}', [
    'as' => 'the.board',
    'uses' => 'BoardController@show',
]);
/*Route::get('board/{boardname}', 'BoardController@show');*/

/*Route delete board. Note: currently not working :(*/

Route::delete('boom/{board_id}',function($board_id){
    $board = App\Board::destroy($board_id);

    return Response::json($board);
});

/*Routes Home to Board. Note: Need to look at auth middleware to reroute to Board or redirect to previous page*/

Route::get('home', 'BoardController@indexx');

Route::get('/about', function () {
    return view('about');
});
Route::get('/enter', function () {
    return view('enter');
});

/*contact form*/
Route::get('contact', ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::post('contact', ['as' => 'contact_store', 'uses' => 'AboutController@store']);
/*Refer your boss*/
Route::post('referboss', ['as' => 'referboss', 'uses' => 'ReferController@store']);

Route::post('/remove/{user_id}/{board_id}', 'BoardController@remove');

Route::delete('invites/{invite_id}',function($invite_id){
    $invite = App\Invite::destroy($invite_id);

    return Response::json($invite);
});
Route::post('Deactivate/{invite_id}', 'LinksController@Deactivate');
Route::post('activate/{invite_id}', 'LinksController@Activate');

Route::controller('invites', 'InviteController');
Route::controller('link', 'LinksController');

Route::group(['prefix' => 'api/v1'], function(){
    Route::post('boards/pincode', 'Api\BoardController@accessViaPincode');

    Route::controller('auth', 'Api\AuthController');
    Route::resource('boards', 'Api\BoardController');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


