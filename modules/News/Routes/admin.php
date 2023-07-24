<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/1/2019
 * Time: 10:02 AM
 */
use Illuminate\Support\Facades\Route;

Route::get('/edit/{id}', 'NewsController@edit')->name('news.admin.edit');
Route::get('/new/{id}/comment', 'NewsController@commentNew')->name('news.admin.commentNew');

Route::post('/store/{id}','NewsController@store')->name('news.admin.store');

Route::get('/category','CategoryController@index')->name('news.admin.category.index');

Route::get('category/getForSelect2','CategoryController@getForSelect2')->name('news.admin.category.getForSelect2');

Route::get('/category/{id}','CategoryController@edit')->name('news.admin.category.edit');

Route::post('/category/store/{id}','CategoryController@store')->name('news.admin.category.store');

Route::get('/tag','TagController@index')->name('news.admin.tag.index');
Route::get('/tag/edit/{id}','TagController@edit')->name('news.admin.tag.edit');
Route::post('/tag/store/{id}','TagController@store')->name('news.admin.tag.store');

// News location

Route::get('/location','LocationController@index')->name('news.admin.location.index');

Route::get('location/getForSelect2','LocationController@getForSelect2')->name('news.admin.location.getForSelect2');

Route::get('/location/{id}','LocationController@edit')->name('news.admin.location.edit');

Route::post('/location/store/{id}','LocationController@store')->name('news.admin.location.store');