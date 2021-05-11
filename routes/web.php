<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/authors', 'App\Http\Controllers\AuthorController@index')->name('authors.index')->middleware("auth");
Route::get('/authors/create', 'App\Http\Controllers\AuthorController@create')->name("authors.create")->middleware("auth");
Route::post('/authors/store', 'App\Http\Controllers\AuthorController@store')->name("authors.store")->middleware("auth");
Route::delete('/author/destroy/{id}', 'App\Http\Controllers\AuthorController@destroy')->name("author.destroy")->middleware("auth");
