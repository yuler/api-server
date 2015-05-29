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

Route::get('/', 'WelcomeController@index');
/*
$router->get('/t', 'AuthenticateController@authenticate');

$router->get('/a', function ()
{
	return JWTAuth::parseToken()->authenticate();
});

$router->post('/home', function ()
{
	return 'post';
});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/

// Get an instance of the API router so we can use it in the routes.php file
$api = app('api.router');

$api->version('v1',['prefix' => 'api', 'protected' => true, 'namespace'=> 'App\Http\Controllers'], function ($api) {
    $api->resource('user','UserController');
});

$router->group(['before' => 'oauth'], function($router)
{
	$router->resource('user', 'UserController');
});


Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});
