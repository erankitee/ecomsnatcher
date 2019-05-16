<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
Route::group(['middleware' => 'jwt.auth'], function () {
	Route::POST('companies', 'Api\UserController@companies');
	Route::POST('projectslist', 'Api\UserController@project');
	Route::POST('projects_detail', 'Api\UserController@projects_detail');
	Route::POST('workorderlist', 'Api\UserController@workorderlist');
	Route::POST('project_dashboard', 'Api\UserController@project_dashboard');
	Route::POST('workorder_details', 'Api\UserController@workorder_details');
	Route::POST('change_pass', 'Api\UserController@profile_change_pass');
	Route::POST('analysis', 'Api\UserController@analysis');
	
});*/

Route::post('auth/login', 'Api\UserController@login');
Route::post('auth/register', 'Api\UserController@register');

