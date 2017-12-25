<?php
Auth::routes();
Route::group(['prefix' => '/admin/crud/user', "middleware" => "auth.admin"], function () {
    Route::get("/", "UserController@index");
    Route::post("/update", "UserController@update");
});
