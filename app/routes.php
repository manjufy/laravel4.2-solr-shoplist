<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get(
    '/',
    function () {
        return View::make('index');
    }
);

# Administrator/Manager Routes

// show manager/admin login page
Route::get(
    'manager',
    [
        'as'   => 'manager',
        'uses' => 'ManagerHomeController@showIndex'
    ]
);

// process the login form

Route::post(
    'manager',
    [
        'uses' => 'ManagerHomeController@doLogin'
    ]
);

// manager/admin landing page
Route::get(
    'manager/dashboard',
    [
        'as'   => 'manager/dashboard',
        'uses' => 'ManagerDashboardController@showIndex'
    ]
);

// logout
Route::get(
    'manager/logout',
    [
        'as'   => 'manager/logout',
        'uses' => 'ManagerHomeController@doLogout'
    ]
);

// Shop related Routes
Route::get(
    'manager/shop',
    [
        'as'   => 'manager/shop',
        'uses' => 'ManagerShopController@showIndex'
    ]
);
