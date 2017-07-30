<?php

Route::group([], function () {
    Route::get('/getModal', "WelcomeController@getModal");
    Route::post('/submitOrder', "WelcomeController@submitOrder");
    Route::get('/', "WelcomeController@index");
});

Route::group(["prefix" => "/admin/crud", "middleware" => "auth.admin"], function () {
    Route::get('/settings', "SettingController@index");
    Route::post('/settings/update', "SettingController@update");
});
