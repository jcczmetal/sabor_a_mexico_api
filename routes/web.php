<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::middleware(['auth','role:keymaker'])->namespace('Keymakers')->group(function(){
    //A este grupo de rutas solo es accesible para un keymaker...
    //Que en todo caso, serían los administradores del sistema y posiblemente un keymaker usuario.

    Route::get('keymakers/dashboard',                   'KeymakersDashboardController@index')->name('keymasters-dashboard');
    Route::get('administrators/index',                  'AdministratorsManagementController@index')->name('index-administrators');
    Route::post('administrators/store',                 'AdministratorsManagementController@store')->name('store-administrators');
    //esta ruta es para cuando tengamos más funcionalidad sobre los administradores.
    Route::get('administrators/{id}/profile',           'AdministratorsManagementController@show')->name('show-administrators');
    Route::put('administrators/{id}/update',            'AdministratorsManagementController@update')->name('update-administrators');
});

Route::middleware(['auth','role:keymaker|admin|associate'])->namespace('Restaurants')->group(function(){

    Route::get('restaurants/index',                     'RestaurantsManagementController@index')->name('mg-index-restaurants');
    Route::post('restaurants/store',                    'RestaurantsManagementController@store')->name('mg-store-restaurant');
    Route::get('restaurants/{slug}',                    'RestaurantsManagementController@show')->name('mg-show-restaurant');
    Route::put('restaurants/{slug}/update',             'RestaurantsManagementController@update')->name('mg-update-restaurant');
});

Route::middleware(['auth','role:keymaker|admin|associate'])->namespace('Addresses')->group(function(){

    Route::get('restaurants/{slug}/addresses',          'RestaurantsAddresesManagementController@index')->name('mg-index-address');
    Route::get('restaurants/{slug}/addresses/create',   'RestaurantsAddresesManagementController@index')->name('mg-index-address');
    Route::post('restaurants/{slug}/store',             'RestaurantsAddresesManagementController@store')->name('mg-store-address');
    Route::put('address/{slug}/update',                 'RestaurantsAddresesManagementController@update')->name('mg-update-address');
    Route::put('address/{slug}/delete',                 'RestaurantsAddresesManagementController@destroy')->name('mg-destroy-address');
});

Route::middleware(['auth','role:admin|keymaker'])->namespace('Administration')->group(function(){
    //Aministrar asociados -> Aquí también deberíamos poder crear users en un solo formulario
    Route::get('associate/index',                       'AssociatesManagementController@index')->name('index-associate');
    Route::post('associate/store',                      'AssociatesManagementController@store');
    Route::get('associate/{slug}/show',                 'AssociatesManagementController@show');
    Route::put('associate/{slug}/update',               'AssociatesManagementController@update');
    //Administrar restaurantes ->
});

//Gestión de información básica del resturante por parte del propio restaurante
Route::middleware(['auth','role:associate','permission:active'])->namespace('Associates')->group(function () {
    Route::get('restaurante/{slug}',                 'LocalManagementController@show')->name('show-restaurant');
    Route::put('restaurante/{slug}/update',          'LocalManagementController@update')->name('edit-restaurant');

    //Gestión de fotos por parte del restaurante
    Route::get('restaurante/{slug}/photos',          'LocalPhotoController@index')->name('index-restaurant-photos');
    Route::post('restaurante/photos/store',          'LocalPhotoController@store')->name('store-restaurant-photo');
    Route::put('restaurante/photo/{id}/delete',      'LocalPhotoController@destroy')->name('delete-restaurant-photo');

	//Gestión de reviews por parte del restaurante
    Route::get('restaurante/{slug}/reviews',         'LocalReviewsManagementController@index')->name('index-restaurant-reviews');
    Route::put('restaurante/review/{id}/update',     'LocalReviewsManagementController@update')->name('update-restaurant-review');
    Route::put('restaurante/review/{id}/delete',     'LocalReviewsManagementController@destroy')->name('delete-restaurant-review');
});
