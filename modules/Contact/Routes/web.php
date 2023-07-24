<?php
use Illuminate\Support\Facades\Route;
//Contact
Route::match(['get','post'],'/contact','ContactController@index');
Route::match(['post'],'/contact/store','ContactController@store');

Route::post('/contact/send-message', 'ContactController@sendMessage')->name('contact.sendMessage');
Route::post('/contact/view-file/{id}', 'ContactController@viewFile')->name('contact.viewFile');
Route::post('/contact/client-subscriber', 'ContactController@clientSubscriber')->name('contact.clientSubscriber');