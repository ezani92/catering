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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontController@index');
Route::post('/check-shipping', 'FrontController@CheckShipping');
Route::post('api/check-shipping', 'FrontController@ApiShipping');
Route::get('/invoice/{hash_id}', 'FrontController@invoice');
Route::get('location-results', 'FrontController@location');
Route::post('order/add-on', 'FrontController@addon');
Route::post('order/check-out', 'FrontController@checkoutPost');
Route::post('order/payment', 'FrontController@payment');
Route::get('order/check-out', 'FrontController@checkoutGet');
Route::post('order/callback', 'CallbackController@billplz');
Route::get('order/redirect', 'FrontController@redirect');
Route::get('order/history', 'FrontController@history');
Route::get('order/history-data/{user_id}', 'FrontController@historydata');
Route::get('order/view/{order_hash}', 'FrontController@vieworder');
Route::get('order/{package_slug}', 'FrontController@package');
Route::get('order/{package_slug}/{set_slug}', 'FrontController@set');


Route::get('/package', function () {
    return view('package');
});

Route::get('/package/selection', function () {
    return view('selection');
});

Auth::routes();



Route::middleware(['isadmin'])->group(function () {

    Route::get('/admin', 'AdminDashboardController@index');

    Route::get('admin/user', 'UserController@index');
    Route::get('admin/user-data', 'UserController@data');
    Route::get('admin/user/add', 'UserController@create');
    Route::get('admin/user/{user_id}', 'UserController@show');
    Route::get('admin/user/{user_id}/edit', 'UserController@edit');
    Route::put('admin/user/{user_id}/edit', 'UserController@update');
    Route::get('admin/user/{user_id}/delete', 'UserController@destroy');

    Route::get('admin/order', 'OrderController@index');
    Route::get('admin/order-data', 'OrderController@data');
    Route::get('admin/order/{order_id}', 'OrderController@show');

    Route::get('admin/package', 'PackageController@index');
    Route::post('admin/package/reposition', 'PackageController@reposition');
    Route::get('admin/package-data', 'PackageController@data');
    Route::get('admin/package/create', 'PackageController@create');
    Route::post('admin/package/create', 'PackageController@store');
    Route::get('admin/package/{package_id}', 'PackageController@show');
    Route::get('admin/package/{package_id}/show', 'PackageController@active');
    Route::get('admin/package/{package_id}/hide', 'PackageController@deactive');
    Route::get('admin/package/{package_id}/edit', 'PackageController@edit');
    Route::put('admin/package/{package_id}/update', 'PackageController@update');
    Route::get('admin/package/{package_id}/unfeatured', 'PackageController@unfeatured');
    Route::get('admin/package/{package_id}/featured', 'PackageController@featured');

    Route::get('admin/item', 'FoodController@index');
    Route::get('admin/item-data', 'FoodController@data');
    Route::get('admin/item/create', 'FoodController@create');
    Route::post('admin/item/create', 'FoodController@store');
    Route::get('admin/item/{food_id}', 'FoodController@show');
    Route::post('admin/item/update', 'FoodController@update');

    Route::get('admin/item-category', 'FoodCategoryController@index');
    Route::get('admin/item-category-data', 'FoodCategoryController@data');
    Route::post('admin/item-category', 'FoodCategoryController@store');
    Route::get('admin/item-category/{category_id}/edit', 'FoodCategoryController@edit');
    Route::post('admin/item-category/{category_id}/update', 'FoodCategoryController@update');

    Route::post('admin/set/reposition', 'SetController@reposition');
    Route::get('admin/set/create', 'SetController@create');
    Route::post('admin/set/create/step2', 'SetController@step2');
    Route::post('admin/set/create/step3', 'SetController@step3');
    Route::get('admin/set/{set_id}', 'SetController@show');
    Route::get('admin/set/{package_id}/show', 'SetController@active');
    Route::get('admin/set/{package_id}/hide', 'SetController@deactive');
    Route::get('admin/set/{package_id}/delete', 'SetController@destroy');
    Route::get('admin/set/{set_id}/edit', 'SetController@edit');
    Route::put('admin/set/{set_id}/update', 'SetController@update');
    Route::get('admin/set/{set_id}/unfeatured', 'SetController@unfeatured');
    Route::get('admin/set/{set_id}/featured', 'SetController@featured');
    Route::get('admin/set/{set_id}/courses/add', 'SetController@coursesAdd');
    Route::post('admin/set/{set_id}/courses/add', 'SetController@coursesStore');

    Route::get('admin/set/{set_id}/courses/{course_category_id}/edit', 'SetController@coursesEdit');
    Route::post('admin/set/{set_id}/courses/{course_category_id}/update', 'SetController@coursesUpdate');
    Route::get('admin/set/{set_id}/courses/{course_category_id}/delete', 'SetController@coursesDelete');

    

    Route::get('admin/shipping', 'ShippingController@index');
    Route::get('admin/shipping-data', 'ShippingController@data');
    Route::post('admin/shipping', 'ShippingController@store');


    Route::get('/admin/notification', function () {
        return view('admin.notification');
    });

    Route::get('/admin/account/{user_id}/edit', 'AccountController@edit');
    Route::put('/admin/account/{user_id}/edit', 'AccountController@update');
    Route::get('/admin/settings', 'SettingController@index');





});

