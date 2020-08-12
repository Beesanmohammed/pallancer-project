<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', 'Users\FrontController@homepage')->name('homepage');


Route::group([
    'prefix'=>'/admin/category',
    'namespace'=>'Admin',
    'middleware'=>'auth',
   // 'middleware'=>['auth' ,'checkuser:admin']

],function(){
    Route::get('/adminDashbord','CategoriesController@adminDashbord')->name('adminDashbord');

    Route::get('/index','CategoriesController@index')->name('index.category');
    Route::get('/create','CategoriesController@create')->name('create');
    Route::post('/store','CategoriesController@store')->name('store');
    Route::get('/{id}/edit','CategoriesController@edit')->name('edit');
    Route::get('/{id}','CategoriesController@show')->name('show');
    Route::put('/{id}/update','CategoriesController@update')->name('update');
    Route::delete('/{id}/delete','CategoriesController@delete')->name('delete');

    
});

Route::group([
    'prefix'=>'/admin/book',
    'namespace'=>'Admin',
    'middleware'=>'auth',

    //'middleware'=>['auth' ,'checkuser:admin']
],function(){
    Route::get('/index','BookController@index')->name('index.book');
    Route::get('/create','BookController@create')->name('create');
    Route::post('/store','BookController@store')->name('store');
    Route::get('/{id}/edit','BookController@edit')->name('edit');
    Route::put('/{id}/update','BookController@update')->name('update');
    Route::delete('/{id}/delete','BookController@delete')->name('delete');
});

Route::group([
    'prefix'=>'/admin/blog',
    'namespace'=>'Admin',
    'middleware'=>'auth',
   // 'middleware'=>['auth' ,'checkuser:admin']

],function(){
    Route::get('/index','BlogController@index')->name('index.blog');
    Route::get('/create','BlogController@create')->name('create');
    Route::post('/store','BlogController@store')->name('store');
    Route::get('/{id}/edit','BlogController@edit')->name('edit');
    Route::get('/{id}','BlogController@show')->name('show');
    Route::put('/{id}/update','BlogController@update')->name('update');
    Route::delete('/{id}/delete','BlogController@delete')->name('delete');
});

Route::group([
    'prefix'=>'homepage',
    'namespace'=>'Users',
    'middleware'=>'auth',

    //'middleware'=>['auth','checkuser:user']
  
],function(){
    Route::get('/blog','FrontController@blog')->name('blog');
    Route::get('/aboutus','FrontController@aboutus')->name('aboutus');
    Route::get('/bookDiscription/{id}','FrontController@bookDiscription')->name('bookDiscription');

    Route::get('/contact','FrontController@contact')->name('contact');
    Route::post('/send','FrontController@send')->name('send');
    



    Route::get('/index','FrontController@index')->name('index');
    Route::get('/create','FrontController@create')->name('create');
    Route::post('/store','FrontController@store')->name('store');
    Route::get('/{id}/edit','FrontController@edit')->name('edit');
    Route::put('/{id}/update','FrontController@update')->name('update');
    Route::delete('/{id}/delete','FrontController@delete')->name('delete');
});


Auth::routes();

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::get('logout','Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');



