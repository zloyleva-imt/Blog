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

Route::get('/', 'HomeController@index')->name('home');
Route::resource('posts', 'PostController')->only(['index','show']);
Auth::routes();

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
    Route::resource('posts', 'PostController');
    Route::resource('pictures', 'PictureController');
});


Route::get('job1', function(){
    \App\Jobs\TestJob::dispatch('JOB1')
        ->delay(now()->addMinutes(1));
    return '';
});

Route::get('job2', function(){
    \App\Jobs\TestJob::dispatch('JOB2');
    return '';
});