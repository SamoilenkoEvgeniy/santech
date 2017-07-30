<?php

Route::group(['prefix' => 'services'], function () {
    Route::get("/", "ServiceController@index");
    Route::get("/{slug}", "ServiceController@show");
});
