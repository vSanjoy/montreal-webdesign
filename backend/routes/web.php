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

include('admin.php');

// Route::group(['namespace' => 'site', 'as' => 'site.'], function () {

//     Route::get('/', function () {
//         return redirect('/'.App::getLocale());
//     });

//     $languages = config('global.WEBSITE_LANGUAGE');
//     foreach ($languages as $localeKey => $localeVal) {
//         Route::group(['prefix' => $localeKey, 'as' => $localeKey.'.'], function() {
//             Route::get('/', 'HomeController@index')->name('home');
//         });
//     }
// });