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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resources([
    'category' => 'CategoryController',
    'post' => 'PostController',
]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@dashboard')->name('admin');
Route::get('/posts/category/{id}', 'HomeController@posts_specefic_category')->name('postCategory');
Route::get('/posts/details/{id}', 'HomeController@specific_post_details')->name('postDetails');


