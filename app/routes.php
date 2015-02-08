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

Route::get(
    'manager/shop/add',
    [
        'as'   => 'manager/shop/add',
        'uses' => 'ManagerShopController@showAdd'
    ]
);

Route::post(
    'manager/shop/add',
    [
        'as'   => 'manager/shop/add',
        'uses' => 'ManagerShopController@add'
    ]
);

Route::get(
    'manager/shop/{id}/edit',
    [
        'as'   => 'manager/shop/edit',
        'uses' => 'ManagerShopController@showEdit'
    ]
);

Route::post(
    'manager/shop/{id}/edit',
    [
        'as'   => 'manager/shop/edit',
        'uses' => 'ManagerShopController@edit'
    ]
);

Route::get(
    'manager/shop/{id}/delete',
    [
        'as'   => 'manager/shop/delete',
        'uses' => 'ManagerShopController@delete'
    ]
);


// Category related Routes
Route::get(
    'manager/category',
    [
        'as'   => 'manager/category',
        'uses' => 'ManagerCategoryController@showIndex'
    ]
);

Route::get(
    'manager/category/add',
    [
        'as'   => 'manager/category/add',
        'uses' => 'ManagerCategoryController@showAdd'
    ]
);

Route::post(
    'manager/category/add',
    [
        'as'   => 'manager/category/add',
        'uses' => 'ManagerCategoryController@add'
    ]
);

Route::get(
    'manager/category/{id}/edit',
    [
        'as'   => 'manager/category/edit',
        'uses' => 'ManagerCategoryController@showEdit'
    ]
);

Route::post(
    'manager/category/{id}/edit',
    [
        'as'   => 'manager/category/edit',
        'uses' => 'ManagerCategoryController@edit'
    ]
);

Route::get(
    'manager/category/{id}/delete',
    [
        'as'   => 'manager/category/delete',
        'uses' => 'ManagerCategoryController@delete'
    ]
);

// Country related Routes
Route::get(
    'manager/country',
    [
        'as'   => 'manager/country',
        'uses' => 'ManagerCountryController@showIndex'
    ]
);

Route::get(
    'manager/country/add',
    [
        'as'   => 'manager/country/add',
        'uses' => 'ManagerCountryController@showAdd'
    ]
);

Route::post(
    'manager/country/add',
    [
        'as'   => 'manager/country/add',
        'uses' => 'ManagerCountryController@add'
    ]
);

Route::get(
    'manager/country/{id}/edit',
    [
        'as'   => 'manager/country/edit',
        'uses' => 'ManagerCountryController@showEdit'
    ]
);

Route::post(
    'manager/country/{id}/edit',
    [
        'as'   => 'manager/country/edit',
        'uses' => 'ManagerCountryController@edit'
    ]
);

Route::get(
    'manager/country/{id}/delete',
    [
        'as'   => 'manager/country/delete',
        'uses' => 'ManagerCountryController@delete'
    ]
);

// State related Routes
Route::get(
    'manager/state',
    [
        'as'   => 'manager/state',
        'uses' => 'ManagerStateController@showIndex'
    ]
);

Route::get(
    'manager/state/add',
    [
        'as'   => 'manager/state/add',
        'uses' => 'ManagerStateController@showAdd'
    ]
);

Route::post(
    'manager/state/add',
    [
        'as'   => 'manager/state/add',
        'uses' => 'ManagerStateController@add'
    ]
);

Route::get(
    'manager/state/{id}/edit',
    [
        'as'   => 'manager/state/edit',
        'uses' => 'ManagerStateController@showEdit'
    ]
);

Route::post(
    'manager/state/{id}/edit',
    [
        'as'   => 'manager/state/edit',
        'uses' => 'ManagerStateController@edit'
    ]
);

Route::get(
    'manager/state/{id}/delete',
    [
        'as'   => 'manager/state/delete',
        'uses' => 'ManagerStateController@delete'
    ]
);

// Town related Routes
Route::get(
    'manager/town',
    [
        'as'   => 'manager/town',
        'uses' => 'ManagerTownController@showIndex'
    ]
);

Route::get(
    'manager/town/add',
    [
        'as'   => 'manager/town/add',
        'uses' => 'ManagerTownController@showAdd'
    ]
);

Route::post(
    'manager/town/add',
    [
        'as'   => 'manager/town/add',
        'uses' => 'ManagerTownController@add'
    ]
);

Route::get(
    'manager/town/{id}/edit',
    [
        'as'   => 'manager/town/edit',
        'uses' => 'ManagerTownController@showEdit'
    ]
);

Route::post(
    'manager/town/{id}/edit',
    [
        'as'   => 'manager/town/edit',
        'uses' => 'ManagerTownController@edit'
    ]
);

Route::get(
    'manager/town/{id}/delete',
    [
        'as'   => 'manager/town/delete',
        'uses' => 'ManagerTownController@delete'
    ]
);

//API Calls

Route::get(
    'manager/api/state/{country_id}',
    [
        'as'   => 'manager/api/state/{country_id}',
        'uses' => 'ManagerAPIController@state'
    ]
);

Route::get(
    'manager/api/town/{state_id}',
    [
        'as'   => 'manager/api/state/{state_id}',
        'uses' => 'ManagerAPIController@town'
    ]
);