<?php

Route::group(['prefix' => '{model}'], function () {
    Route::get("/", "ServiceController@index");
    Route::get("/{slug}", "ServiceController@show");
});


Route::group(['prefix' => '/admin/crud/services/{model}', "middleware" => ["auth.admin"]], function () {
    Route::get("/", 'Crud\ServiceController@index');
    Route::get("/edit/{id}", 'Crud\ServiceController@edit');
    Route::get("/create", 'Crud\ServiceController@create');
    Route::post("/store", 'Crud\ServiceController@store');
    Route::post("/update", 'Crud\ServiceController@update');
    Route::get("/delete/{id}", 'Crud\ServiceController@delete');
});

Route::get('/sitemap.xml', function () {
    $services = \App\Modules\Content\Models\Service::all();
    $articles = \App\Modules\Content\Models\Article::all();
    return response()->view('sitemap', compact('services', 'articles'))->header('Content-Type', 'text/xml');
});