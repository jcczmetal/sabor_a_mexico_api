<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::middleware(['auth','role:keymaker'])->namespace('Keymakers')->group(function(){
    /*
        Keymakers: pueden crear usuarios, 
                   asignarles roles de asociado, administrador, etc, desactivarlos, 
                   crear restaurantes, desactivarlos 
    */

    //Dashboard con números de todos los modelos a los que sólo pueden acceder los keymakers. //Done
    Route::get('keymakers/dashboard',                       'KeymakersDashboardController@index')->name('keymasters-dashboard');
    
    //Supongo que temporalmente no necesitamos esto.
    Route::get('administrators/index',                      'AdministratorsManagementController@index')->name('index-administrators');
    
    //Esta de plano no la utilizamos por el momento
    Route::get('administrators/create',                     'AdministratorsManagementController@create')->name('create-administrators');
    
    //Esta sí
    Route::post('administrators/store',                     'AdministratorsManagementController@store')->name('store-administrators');
    
    //Debe tener su propia página
    Route::get('administrators/{slug}/show',                'AdministratorsManagementController@show')->name('show-administrators');
    
    //Esta tampoco, es el mismo modal del create pero con los datos.
    Route::get('administrators/{slug}/edit',                'AdministratorsManagementController@edit')->name('edit-administrators');
    
    //a esta apunta el ajax
    Route::put('administrators/{slug}/update',              'AdministratorsManagementController@update')->name('update-administrators');
    
    //Asignar roles
    //Asignamos 
});

Route::middleware(['auth','role:keymaker|admin|associate'])->namespace('Restaurants')->group(function(){
    /*
        Keymakers: pueden crear usuarios, 
                   asignarles roles de asociado, administrador, etc, desactivarlos, 
                   crear restaurantes, desactivarlos 
    */
    
    Route::get('restaurants/index',                      'RestaurantsManagementController@index')->name('index-restaurants');
    Route::get('restaurants/create',                     'RestaurantsManagementController@create')->name('index-restaurants');
    Route::post('restaurants/store',                     'RestaurantsManagementController@store')->name('index-restaurants');
    Route::get('restaurants/{slug}/show',                'RestaurantsManagementController@show')->name('index-restaurants');
    Route::get('restaurants/{slug}/edit',                'RestaurantsManagementController@edit')->name('index-restaurants');
    Route::put('restaurants/{slug}/update',              'RestaurantsManagementController@update')->name('index-restaurants');
    
    //Asignar roles
    //Asignamos 
});

Route::middleware(['auth','role:admin|keymaker'])->namespace('Administration')->group(function(){
    //Aministrar asociados -> Aquí también deberíamos poder crear users en un solo formulario
    Route::get('associate/index',                  'AssociatesManagementController@index')->name('index-associate');
    Route::post('associate/store',                 'AssociatesManagementController@store');
    Route::get('associate/{slug}/assign',          'AssociatesManagementController@show');
    Route::get('associate/{slug}/edit',            'AssociatesManagementController@edit');
    Route::put('associate/{slug}/assign',          'AssociatesManagementController@update');
    //Administrar restaurantes -> 
});

//Gestión de información básica del resturante por parte del propio restaurante
Route::middleware(['auth','role:associate','permission:active'])->namespace('Associates')->group(function () {
    Route::get('restaurante/{slug}',               'LocalManagementController@show')->name('show-restaurant');
    Route::get('restaurante/{slug}/edit',          'LocalManagementController@edit')->name('edit-restaurant');
    Route::put('restaurante/{slug}/update',        'LocalManagementController@update')->name('edit-restaurant');    
    
    //Gestión de fotos por parte del restaurante
    Route::get('restaurante/{slug}/photos',        'LocalPhotoController@index')->name('index-restaurant-photos');
    Route::post('restaurante/photos/store',        'LocalPhotoController@store')->name('store-restaurant-photo');
    Route::put('restaurante/photo/{id}/delete',    'LocalPhotoController@destroy')->name('delete-restaurant-photo');
    
	//Gestión de reviews por parte del restaurante
    Route::get('restaurante/{slug}/reviews',       'LocalReviewsManagementController@index')->name('index-restaurant-reviews');
    Route::get('restaurante/review/{id}/edit',     'LocalReviewsManagementController@edit')->name('store-restaurant-review');
    Route::put('restaurante/review/{id}/update',   'LocalReviewsManagementController@update')->name('update-restaurant-review');
    Route::put('restaurante/review/{id}/delete',   'LocalReviewsManagementController@destroy')->name('delete-restaurant-review');
});