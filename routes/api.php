<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'RegisterController@register');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout')->middleware('auth:sanctum'); 

Route::get('/gallery', 'GalleryController@index');
Route::post('/gallery/add', 'GalleryController@add');
Route::delete('/gallery/delete/{id}', 'GalleryController@delete');

Route::get('/slider', 'SliderController@index');
Route::post('/slider/add', 'SliderController@add');
Route::delete('/slider/delete/{id}', 'SliderController@delete');

Route::get('/product', 'ProductController@index');
Route::post('/product/add', 'ProductController@add');
Route::delete('/product/delete/{id}', 'ProductController@delete');
Route::get('/product/products/{id}', 'ProductController@productsid');

Route::get('/partner', 'PartnerController@index');
Route::post('/partner/add', 'PartnerController@add');
Route::delete('/partner/delete/{id}', 'PartnerController@delete');

Route::get('/slogan', 'SloganController@index');
Route::post('/slogan/add', 'SloganController@add');
Route::delete('/slogan/delete/{id}', 'SloganController@delete');

Route::get('/download{file}','ProductController@download');


Route::get('/product/poultry', 'ProductController@poultry');
Route::get('/product/ruminent', 'ProductController@ruminent');
Route::get('/product/aqua', 'ProductController@aqua');