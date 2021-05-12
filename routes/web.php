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
Route::get('/authors/show/{author}', 'App\Http\Controllers\AuthorController@show')->name('authors.show')->middleware("auth");
Route::get('/authors/create', 'App\Http\Controllers\AuthorController@create')->name("authors.create")->middleware("auth");
Route::post('/authors/create', 'App\Http\Controllers\AuthorController@store')->middleware("auth");
Route::get('/authors/edit/{author}', 'App\Http\Controllers\AuthorController@edit')->name("authors.edit")->middleware("auth");
Route::post('/authors/edit/{author}', 'App\Http\Controllers\AuthorController@update')->middleware("auth");
Route::delete('/author/destroy/{id}', 'App\Http\Controllers\AuthorController@destroy')->name("author.destroy")->middleware("auth");

Route::get('/books', 'App\Http\Controllers\BookController@index')->name('books.index')->middleware("auth");
Route::get('/show/{author}', 'App\Http\Controllers\BookController@show')->name('books.show')->middleware("auth");
Route::get('/books/create', 'App\Http\Controllers\BookController@create')->name("books.create")->middleware("auth");
Route::post('/books/create', 'App\Http\Controllers\BookController@store')->middleware("auth");
Route::get('/books/edit/{book}', 'App\Http\Controllers\BookController@edit')->name("books.edit")->middleware("auth");
Route::post('/books/edit/{book}', 'App\Http\Controllers\BookController@update')->middleware("auth");
Route::delete('/book/destroy/{id}', 'App\Http\Controllers\BookController@destroy')->name("book.destroy")->middleware("auth");

