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

Route::get('/','WelcomeController@index')->name('welcome');

Auth::routes();

Route::middleware(['auth'])->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories','CategoriesController');
    Route::resource('posts','PostsController');
    Route::resource('tags','TagsController');
    Route::get('trashed','PostsController@trash')->name('trashed.index');
    Route::put('restore/{post}','PostsController@restore')->name('post.restore');

});

Route::middleware(['auth','admin'])->group(function (){
    Route::get('users','UsersController@index')->name('users.index');
    Route::get('users/profile','UsersController@edit')->name('users.edit-profile');
    Route::put('users/profile','UsersController@update')->name('users.update-profile');
    Route::post('users/{user}/makeAdmin','UsersController@makeAdmin')->name('users.makeAdmin');
});
