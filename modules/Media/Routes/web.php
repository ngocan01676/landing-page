<?php
use Illuminate\Support\Facades\Route;
//
//Route::get('media/private/view','MediaController@privateFileView')->middleware('auth')->name('media.private.view');
Route::get('media/private/view','MediaController@privateFileView')->name('media.private.view');
Route::get('/media/public/view/{file_url}','MediaController@publicFileView')->name('media.public.view');
// Media
Route::group(['prefix'=>'media'],function(){
    Route::get('/preview/{id}/{size?}','\Modules\Media\Controllers\MediaController@preview');//
    Route::post('/private/store','MediaController@privateFileStore')->name('media.private.store');//
});
Route::group(['middleware' => ['auth']],function(){
    Route::match(['get','post'],'/admin/module/media/store','\Modules\Media\Admin\MediaController@store');
    Route::match(['get','post'],'/admin/module/media/getLists','\Modules\Media\Admin\MediaController@getLists');
    Route::match(['get','post'],'/admin/module/media/removeFiles','\Modules\Media\Admin\MediaController@removeFiles');
});
