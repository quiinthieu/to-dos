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

Route::middleware('auth')->group(function() {
    Route::get('/home', 'HomeController@index');
    Route::get('/todos', 'TodoController@index')->name('todo.index');
    Route::get('/todos/create', 'TodoController@create');
    Route::get('/todos/{id}/edit', 'TodoController@edit');
    Route::patch('/todos/{id}/update', 'TodoController@update')->name('todo.update');
    Route::put('/todos/{id}/toggle', 'TodoController@toggleCompleted')->name('todo.toggle');
    Route::delete('/todos/{id}/delete', 'TodoController@delete')->name('todo.delete');
    Route::post('/todos/create', 'TodoController@store');
});

