<?php


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


Route::post('Login',            'ApiController@Login');

Route::post('Signup',           'ApiController@Signup');

Route::get('Banners',           'ApiController@Banners');

Route::get('CustomProducts',    'ApiController@CustomProducts');

Route::get('ArtisanCategories', 'ApiController@ArtisanCategories');

Route::get('ArtisanProducts',   'ApiController@ArtisanProducts');

Route::get('CustomPatterns',    'ApiController@CustomPatterns');

Route::get('PriceCategories',   'ApiController@PriceCategories');

Route::get('TypeCategories',    'ApiController@TypeCategories');

Route::get('Settings',          'ApiController@Settings');

Route::get('OrderStatuses',     'ApiController@OrderStatuses');

Route::get('ClearCache',        'ApiController@ClearCache');



Route::post('Carts',            'ApiController@Carts');

Route::prefix('Cart')->group(function () {
    Route::post('/Add',         'ApiController@AddCart');
    Route::post('/Update',      'ApiController@UpdateCart');
    Route::post('/Delete',      'ApiController@DeleteCart');
});


Route::prefix('Address')->group(function () {
    Route::post('/All',         'ApiController@AllAddress');
    Route::post('/Add',         'ApiController@AddAddress');
    Route::post('/Update',      'ApiController@UpdateAddress');
    Route::post('/Delete',      'ApiController@DeleteAddress');

    Route::get('/Provinces',    'ApiController@AllProvinces');
    Route::post('/Cities',      'ApiController@Cities');
    Route::post('/PostalCode',  'ApiController@PostalCode');
});


Route::prefix('Order')->group(function () {
    Route::post('/All',         'ApiController@AllOrders');
    Route::post('/Add',         'ApiController@AddOrder');
    Route::post('/Update',      'ApiController@UpdateOrder');
});


Route::post('charge',           'ApiController@SnapToken');