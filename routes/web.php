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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{id}', 'HomeController@post')->name('post');
Route::get('/cate/{id}', 'HomeController@cate')->name('cate');
Route::get('/like/list', 'HomeController@likelist')->name('likelist');
Route::get('/like/{id}', 'HomeController@like')->name('like');
Route::get('/search/{key}', 'HomeController@search')->name('search');

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::get('/', 'Admin\HomeController@index')->name('admin.home');

    Route::group(['prefix' => 'post'], function()
    {
        Route::get('/list', 'Admin\PostController@index')->name('admin.post.list');
        Route::get('/add', 'Admin\PostController@add')->name('admin.post.add');
        Route::post('/store','Admin\PostController@store')->name('admin.post.store');
        Route::get('/edit/{id}', 'Admin\PostController@edit')->name('admin.post.edit');
        Route::post('/update/{id}', 'Admin\PostController@update')->name('admin.post.update');
        Route::get('/delete/{id}', 'Admin\PostController@delete')->name('admin.post.delete');
    });


    Route::group(['prefix' => 'member'], function()
    {
        Route::get('/list', 'Admin\MemberController@index')->name('admin.member.list');
        Route::get('/add', 'Admin\MemberController@add')->name('admin.member.add');
        Route::post('/store','Admin\MemberController@store')->name('admin.member.store');
        Route::get('/edit/{id}', 'Admin\MemberController@edit')->name('admin.member.edit');
        Route::post('/update/{id}', 'Admin\MemberController@update')->name('admin.member.update');
        Route::get('/delete/{id}', 'Admin\MemberController@delete')->name('admin.member.delete');
    });

    Route::group(['prefix' => 'cate'], function()
    {
        Route::get('/list', 'Admin\CateController@index')->name('admin.cate.list');
        Route::get('/add', 'Admin\CateController@add')->name('admin.cate.add');
        Route::post('/store','Admin\CateController@store')->name('admin.cate.store');
        Route::get('/edit/{id}', 'Admin\CateController@edit')->name('admin.cate.edit');
        Route::post('/update/{id}', 'Admin\CateController@update')->name('admin.cate.update');
        Route::get('/delete/{id}', 'Admin\CateController@delete')->name('admin.cate.delete');
    });

    Route::group(['prefix' => 'ingredient'], function()
    {
        Route::get('/list', 'Admin\IngerdientController@list')->name('admin.ingredient.list');
        Route::get('/add', 'Admin\IngerdientController@add')->name('admin.ingredient.add');
        Route::post('/store','Admin\IngerdientController@store')->name('admin.ingredient.store');
        Route::get('/edit/{id}', 'Admin\IngerdientController@edit')->name('admin.ingredient.edit');
        Route::post('/update/{id}', 'Admin\IngerdientController@update')->name('admin.ingredient.update');
        Route::get('/delete/{id}', 'Admin\IngerdientController@delete')->name('admin.ingredient.delete');
    });
});

Route::group(['prefix' => 'api'], function()
{
    Route::get('/find/{ingredient}', 'ApiController@findIngredient')->name('admin.api.findIngredient');
});


