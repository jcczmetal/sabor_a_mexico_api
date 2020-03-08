<?php

	//Gestión de información básica del resturante por parte del propio restaurante
    Route::get('restaurante/{slug}',               'LocalManagementController@show')->name('show-restaurant');
    Route::get('restaurante/{slug}/edit',          'LocalManagementController@edit')->name('edit-restaurant');
    Route::put('restaurante/{slug}/update',        'LocalManagementController@update')->name('edit-restaurant');

    //Gestión de fotos por parte del restaurante
    Route::get('restaurante/{slug}/photos',        'LocalPhotoController@index')->name('index-restaurant-photos');
    Route::post('restaurante/photos/store',        'LocalPhotoController@store')->name('store-restaurant-photo');
    Route::put('restaurante/photo/{id}/delete',    'LocalPhotoController@destroy')->name('delete-restaurant-photo');

	//Gestión de reviews por parte del restaurante
    Route::get('restaurante/{slug}/reviews',        'LocalReviewsManagementController@index')->name('index-restaurant-reviews');
    Route::get('restaurante/review/{id}/edit',      'LocalReviewsManagementController@edit')->name('store-restaurant-review');
    Route::put('restaurante/review/{id}/update',    'LocalReviewsManagementController@update')->name('update-restaurant-review');
    Route::put('restaurante/review/{id}/delete',    'LocalReviewsManagementController@destroy')->name('delete-restaurant-review');
