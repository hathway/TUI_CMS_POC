<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get("admin/pages","PagesController@index");
Route::get("admin/pages/manage","PagesController@manage");
Route::get("admin/pages/add","PagesController@create");
Route::post("admin/pages/add","PagesController@create");
Route::get("admin/pages/edit/{id}","PagesController@edit");
Route::post("admin/pages/edit/{id}","PagesController@edit");
Route::get("admin/pages/delete/{id}","PagesController@destroy");

Route::get("/{slug}","PagesController@render");
Route::get("/pages.json","PagesController@json");
Route::get("/", function() {
    return redirect("/admin/pages");
});