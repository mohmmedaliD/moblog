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

Route::resource('/cats', App\Http\Controllers\CategoryController::class);

Route::resource('/blogs', App\Http\Controllers\BlogController::class);


Route::get('/admin/blogs/trashed', [App\Http\Controllers\BlogController::class, 'trashed'])->name('trashed');

Route::post('/admin/blogs/trashed/{id}', [App\Http\Controllers\BlogController::class, 'restore'])->name('restore');