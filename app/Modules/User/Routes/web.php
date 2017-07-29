<?php
Auth::routes();
Route::group(['prefix' => 'user'], function () {
    Route::get('/', function () {
        dd('This is the User module index page. Build something great!');
    });
});
