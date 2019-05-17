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


use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => ['auth', 'set.foo']], function (){
    // Here We Can Add Our Routes

    Route::get('/', 'HomeController@index')->name('home');


    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('emails', 'MailController@index')->name('mails.index');

    Route::post('emails/send', 'MailController@send')->name('mails.send');

    // We can add more routes here to use same functionality....

    Route::get('demo', function (){
        return 'Demo';
    });
});


Route::group(['middleware' => ['auth', 'no.need.set.foo']], function (){
    Route::get('setfoo', 'FooController@setFoo');

    Route::post('setfoo', 'FooController@storeFoo')->name('foo.store');
});


