<?php

Route::group([
    'namespace' => 'App\Modules\Base\Http\Controllers'
], function () {

    Route::get('/sitemap.xml', function () {
        $services = \App\Modules\Content\Models\Service::all();
        $articles = \App\Modules\Content\Models\Article::all();
        return response()->view('sitemap', compact('services', 'articles'))->header('Content-Type', 'text/xml');
    });

    Route::get('/getModal', "WelcomeController@getModal");
    Route::post('/submitOrder', "WelcomeController@submitOrder");
    Route::get('/', "WelcomeController@index");
});

Route::group([
    'namespace' => 'App\Modules\Base\Http\Controllers',
    "prefix" => "/admin/crud",
    "middleware" => "auth.admin"
], function () {
    Route::get('/settings', "SettingController@index");
    Route::post('/settings/update', "SettingController@update");
});

Route::group([
    'namespace' => 'App\Modules\Content\Http\Controllers',
    'prefix' => '{model}'
], function () {

    Route::get("/", "ServiceController@index");
    Route::get("/{slug}", "ServiceController@show");
});


Route::group([
    'prefix' => '/admin/crud/services/{model}',
    "middleware" => ["auth.admin"],
    'namespace' => 'App\Modules\Content\Http\Controllers',
], function () {
    Route::get("/", 'Crud\ServiceController@index');
    Route::get("/edit/{id}", 'Crud\ServiceController@edit');
    Route::get("/create", 'Crud\ServiceController@create');
    Route::post("/store", 'Crud\ServiceController@store');
    Route::post("/update", 'Crud\ServiceController@update');
    Route::get("/delete/{id}", 'Crud\ServiceController@delete');
});