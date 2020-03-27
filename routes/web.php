<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Category;
use App\Product;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $products = Product::paginate(6);
    $categories = Category::has('products')->get();
    return view('welcome')->with(compact('products','categories'));
});

Auth::routes();

Route::get('/carrito', 'CarritoController@index');
Route::get('/order', 'OrderController@index');
Route::get('/order/{id}', 'OrderController@show');
Route::get('/products/{id}','Product2Controller@show'); 
Route::post('/item','ItemController@store');
Route::post('/item/{id}','ItemController@update');
Route::delete('/item','ItemController@destroy');
Route::post('/order','OrderController@update');
Route::get('/categories/{id}','Category2Controller@show');
Route::get('/search','SearchController@show');





Route::middleware(['auth','admin'])->group(function(){
    Route::get('/admin/products','ProductController@index'); // listado
    Route::get('/admin/products/create','ProductController@create'); // formulario
    Route::post('/admin/products','ProductController@store'); // registrar
    Route::get('/admin/products/{id}/edit','ProductController@edit'); //formulario edicion
    Route::post('/admin/products/{id}/edit','ProductController@update'); // actualizar
    Route::post('/admin/products/{id}/delete','ProductController@destroy'); // form eliminar

    Route::get('/admin/categories','CategoryController@index'); // listado
    Route::get('/admin/categories/create','CategoryController@create'); // formulario
    Route::post('/admin/categories','CategoryController@store'); // registrar
    Route::get('/admin/categories/{id}/edit','CategoryController@edit'); //formulario edicion
    Route::post('/admin/categories/{id}/edit','CategoryController@update'); // actualizar
    Route::post('/admin/categories/{id}/delete','CategoryController@destroy'); // form eliminar

    Route::get('/admin/users','UserController@index'); // listado
    Route::get('/admin/users/create','UserController@create'); // formulario
    Route::post('/admin/users','UserController@store'); // registrar
    Route::get('/admin/users/{id}/edit','UserController@edit'); //formulario edicion
    Route::post('/admin/users/{id}/edit','UserController@update'); // actualizar
    Route::get('/admin/users/{id}/orders','UserController@show'); // actualizar
    Route::post('/admin/users/{id}/delete','UserController@destroy'); // form eliminar
});