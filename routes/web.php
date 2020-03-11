<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/', 'BannerController@index')->name('admin.index');

// Route::prefix('dashboard')->group(function () {  
//     Route::get('/default', function(){          return view('dashboard.homepage'); });
//     Route::get('/ecommerce', function(){        return view('dashboard.ecommerce'); });
//     Route::get('/crm', function(){              return view('dashboard.crm'); });
//     Route::get('/analytics', function(){        return view('dashboard.analytics'); });
//     Route::get('/crypto', function(){           return view('dashboard.crypto'); });
//     Route::get('/project', function(){          return view('dashboard.project'); });
// });


// Manage Administrators

Route::prefix('admin/administrator')->group(function () {  
    Route::get('/',          'AdministratorController@index')->name('admin.administrator.index');
    Route::get('/add',       'AdministratorController@add')->name('admin.administrator.add');
    Route::post('/store',    'AdministratorController@createAdministrator')->name('admin.administrator.store');
    Route::get('/edit',      'AdministratorController@edit')->name('admin.administrator.edit');
    Route::post('/update',   'AdministratorController@update')->name('admin.administrator.update');
    Route::get('/delete',    'AdministratorController@delete')->name('admin.administrator.delete');
});


// Manage Pattern Submitters

Route::prefix('admin/patternsubmitter')->group(function () {  
    Route::get('/',          'PatternSubmitterController@index')->name('admin.patternsubmitter.index');
    Route::get('/enable',    'PatternSubmitterController@enable')->name('admin.patternsubmitter.enable');
    Route::get('/disable',   'PatternSubmitterController@disable')->name('admin.patternsubmitter.disable');
    Route::get('/delete',    'PatternSubmitterController@delete')->name('admin.patternsubmitter.delete');
});

// Manage Customers

Route::prefix('admin/customer')->group(function () { 
    Route::get('/',          'CustomerController@index')->name('admin.customer.index');
    Route::get('/add',       'CustomerController@add')->name('admin.customer.add');
    Route::post('/store',    'CustomerController@create')->name('admin.customer.store');
    Route::get('/edit',      'CustomerController@edit')->name('admin.customer.edit');
    Route::post('/update',   'CustomerController@update')->name('admin.customer.update');
    Route::get('/delete',    'CustomerController@delete')->name('admin.customer.delete');
});


// Manage Artisan Category

Route::prefix('admin/artisan/category')->group(function () {  
    Route::get('/',          'ArtisanCategoryController@index')->name('admin.artisan.category.index');
    Route::get('/add',       'ArtisanCategoryController@add')->name('admin.artisan.category.add');
    Route::post('/store',    'ArtisanCategoryController@store')->name('admin.artisan.category.store');
    Route::get('/edit',      'ArtisanCategoryController@edit')->name('admin.artisan.category.edit');
    Route::post('/update',   'ArtisanCategoryController@update')->name('admin.artisan.category.update');
    Route::get('/delete',    'ArtisanCategoryController@delete')->name('admin.artisan.category.delete');
});

// Manage Artisan Product

Route::prefix('admin/artisan/product')->group(function () {  
    Route::get('/',          'ArtisanProductController@index')->name('admin.artisan.product.index');
    Route::get('/add',       'ArtisanProductController@add')->name('admin.artisan.product.add');
    Route::post('/store',    'ArtisanProductController@store')->name('admin.artisan.product.store');
    Route::get('/edit',      'ArtisanProductController@edit')->name('admin.artisan.product.edit');
    Route::post('/update',   'ArtisanProductController@update')->name('admin.artisan.product.update');
    Route::get('/delete',    'ArtisanProductController@delete')->name('admin.artisan.product.delete');
});

// Manage Custom Products

Route::prefix('admin/customproduct')->group(function () { 
    Route::get('/',          'CustomProductController@index')->name('admin.customproduct.index');
    Route::get('/search',    'CustomProductController@search')->name('admin.customproduct.search');
    Route::get('/add',       'CustomProductController@add')->name('admin.customproduct.add');
    Route::post('/store',    'CustomProductController@store')->name('admin.customproduct.store');
    Route::get('/edit',      'CustomProductController@edit')->name('admin.customproduct.edit');
    Route::post('/update',   'CustomProductController@update')->name('admin.customproduct.update');
    Route::get('/delete',    'CustomProductController@delete')->name('admin.customproduct.delete');
});

// Manage Custom Patterns

Route::prefix('admin/custompattern')->group(function () {
    Route::get('/',          'CustomPatternController@index')->name('admin.custompattern.index');
    Route::get('/add',       'CustomPatternController@add')->name('admin.custompattern.add');
    Route::post('/store',    'CustomPatternController@store')->name('admin.custompattern.store');
    Route::get('/edit',      'CustomPatternController@edit')->name('admin.custompattern.edit');
    Route::post('/update',   'CustomPatternController@update')->name('admin.custompattern.update');
    Route::get('/delete',    'CustomPatternController@delete')->name('admin.custompattern.delete');
});


// Manage Orders

Route::prefix('admin/order')->group(function(){
    Route::get('/',             'OrderController@index')->name('admin.order.index');
    Route::get('/edit',         'OrderController@edit')->name('admin.order.edit');
    Route::post('/update',       'OrderController@update')->name('admin.order.update');
    Route::get('/delete',       'OrderController@delete')->name('admin.order.delete');
});


// Manage Orders

Route::prefix('admin/shippingcost')->group(function(){
    Route::get('/',             'ShippingCostController@index')->name('admin.shippingcost.index');
    Route::get('/add',          'ShippingCostController@add')->name('admin.shippingcost.add');
    Route::post('/store',       'ShippingCostController@store')->name('admin.shippingcost.store');
    Route::get('/edit',         'ShippingCostController@edit')->name('admin.shippingcost.edit');
    Route::post('/update',      'ShippingCostController@update')->name('admin.shippingcost.update');
    Route::get('/delete',       'ShippingCostController@delete')->name('admin.shippingcost.delete');
});


// Manage Promotion Code

Route::prefix('admin/promotioncode')->group(function(){
    Route::get('/',             'PromotionCodeController@index')->name('admin.promotioncode.index');
    Route::get('/add',          'PromotionCodeController@add')->name('admin.promotioncode.add');
    Route::post('/store',       'PromotionCodeController@store')->name('admin.promotioncode.store');
    Route::get('/edit',         'PromotionCodeController@edit')->name('admin.promotioncode.edit');
    Route::post('/update',      'PromotionCodeController@update')->name('admin.promotioncode.update');
    Route::get('/delete',       'PromotionCodeController@delete')->name('admin.promotioncode.delete');
});


// Manage Banners

Route::prefix('admin/banner')->group(function () {  
    Route::get('/',             'BannerController@index')->name('admin.banner.index');
    Route::post('/create',      'BannerController@upload')->name('admin.banner.upload');
    Route::get('/delete',       'BannerController@delete')->name('admin.banner.delete');
});


// Manage Settings Menu

Route::prefix('admin/settings/faq')->group(function () {  
    Route::get('/',          'FaqController@index')->name('admin.settings.faq.index');
    Route::post('/update',   'FaqController@update')->name('admin.settings.faq.update');
});


Route::prefix('admin/settings/pricecategory')->group(function () {  
    Route::get('/',          'PriceCategoryController@index')->name('admin.settings.pricecategory.index');
    Route::get('/add',       'PriceCategoryController@add')->name('admin.settings.pricecategory.add');
    Route::post('/store',    'PriceCategoryController@store')->name('admin.settings.pricecategory.store');
    Route::get('/edit',      'PriceCategoryController@edit')->name('admin.settings.pricecategory.edit');
    Route::post('/update',   'PriceCategoryController@update')->name('admin.settings.pricecategory.update');
    Route::get('/delete',    'PriceCategoryController@delete')->name('admin.settings.pricecategory.delete');
});

Route::prefix('admin/settings/typecategory')->group(function () {  
    Route::get('/',          'TypeCategoryController@index')->name('admin.settings.typecategory.index');
    Route::get('/add',       'TypeCategoryController@add')->name('admin.settings.typecategory.add');
    Route::post('/store',    'TypeCategoryController@store')->name('admin.settings.typecategory.store');
    Route::get('/edit',      'TypeCategoryController@edit')->name('admin.settings.typecategory.edit');
    Route::post('/update',   'TypeCategoryController@update')->name('admin.settings.typecategory.update');
    Route::get('/delete',    'TypeCategoryController@delete')->name('admin.settings.typecategory.delete');
});


// Manage Notification 

Route::get('notify/index', 'NotificationController@index');