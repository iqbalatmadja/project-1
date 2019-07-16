<?php
$theme = env('THEME_IN_USE');
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('frontend')->middleware(['setTheme:'.$theme]);
Route::get('/profile', 'ProfileController@index')->name('profile')->middleware('auth')->middleware(['setTheme:'.$theme]);
Route::post('/profile/update', 'ProfileController@updateProfile')->name('profile.update');
Route::get('/changePassword','ProfileController@changePasswordForm')->middleware('auth')->middleware(['setTheme:'.$theme]);
Route::post('/changePassword','ProfileController@changePassword')->name('changePassword')->middleware('auth');

//Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware(['setTheme:'.$theme])->middleware('auth');


// Tests
Route::get('/test','TestController@index')->name('test')->middleware(['setTheme:'.$theme]);
Route::get('/test/datepickers','TestController@datepickers')->name('datepickers')->middleware(['setTheme:'.$theme]);
Route::get('/test/echarts','TestController@echarts')->name('echarts')->middleware(['setTheme:'.$theme]);
Route::get('/test/ckeditor','TestController@ckeditor')->name('ckeditor')->middleware(['setTheme:'.$theme]);
Route::get('/test/ajax1','TestController@ajax1')->name('ajax1')->middleware(['setTheme:'.$theme]);
