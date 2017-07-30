<?php

Route::group([], function () {
    Route::get('/getModal', "WelcomeController@getModal");
    Route::get('/', "WelcomeController@index");
});

Route::group(["prefix" => "/admin/crud", "middleware" => "auth.admin"], function () {
    Route::get('/settings', "SettingController@index");
    Route::post('/settings/update', "SettingController@update");
});
