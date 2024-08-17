<?php

use Illuminate\Support\Facades\Route;


Route::get("/api/test-me", function () {
    return 'Hello from Laravel!';
});

Route::post("/api/register", "App\Http\Controllers\HomeController@register");
Route::get("/api/information", "App\Http\Controllers\HomeController@getInformations");
Route::post("/api/information", "App\Http\Controllers\HomeController@createInformation");

Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');