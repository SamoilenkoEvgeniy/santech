<?php

Route::group(['prefix' => 'services'], function () {
    Route::get("/", "ServiceController@index");
    Route::get("/{slug}", "ServiceController@show");
});


Route::group(['prefix' => '/admin/crud/services', "middleware" => ["auth.admin"]], function () {
    Route::get("/", 'Crud\ServiceController@index');
    Route::get("/edit/{id}", 'Crud\ServiceController@edit');
    Route::get("/create", 'Crud\ServiceController@create');
    Route::post("/store", 'Crud\ServiceController@store');
    Route::post("/update", 'Crud\ServiceController@update');
    Route::get("/delete/{id}", 'Crud\ServiceController@delete');
});

Route::get('/sitemap.xml', function () {
    $services = \App\Modules\Content\Models\Service::all();
    return response()->view('sitemap', compact('services'))->header('Content-Type', 'text/xml');
});