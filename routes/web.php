<?php

    Route::middleware(['auth','role:keymaker'])->namespace('Keymakers')->group(function(){
        /*
            Keymakers: pueden crear usuarios, 
                       asignarles roles de asociado, administrador, etc, desactivarlos, 
                       crear restaurantes, desactivarlos 
        */
    
        Route::get('administrators/index',                      'AdministratorsManagementController@index');
        Route::get('administrators/create',                     'AdministratorsManagementController@create');
        Route::post('administrators/store',                     'AdministratorsManagementController@store');
        Route::get('administrators/{slug}/show',                'AdministratorsManagementController@show');
        Route::get('administrators/{slug}/edit',                'AdministratorsManagementController@edit');
        Route::put('administrators/{slug}/update',              'AdministratorsManagementController@update');
    
        //Asignar roles
        //Asignamos 
    });

    Route::middleware(['auth','role:admin','permission:active'])->namespace('Administration')->group(function(){
        //Administrar asociados -> Aquí también deberíamos poder crear users en un solo formulario
        Route::get('associate/index',                  'AssociatesManagementController@index');
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


    

    
    
    

    

    
