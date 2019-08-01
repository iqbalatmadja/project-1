<?php   
$theme = env('APP_THEME');
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

# undone 
Route::get('/test/countryList','TestController@countryList')->name('countryList')->middleware(['setTheme:'.$theme])->middleware('auth');
Route::post('/test/populateCountry','TestController@populateCountry')->name('populateCountry')->middleware(['setTheme:'.$theme])->middleware('auth');

#
Route::post('/ajaxDummy','TestController@ajaxDummy')->name('ajaxDummy')->middleware(['setTheme:'.$theme]);

Route::get('/company-list','CompanyController@list')->name('companyList')->middleware(['setTheme:'.$theme])->middleware('auth');
Route::post('/populateCompany','CompanyController@populateCompany')->name('populateCompany')->middleware(['setTheme:'.$theme])->middleware('auth');
Route::post('/getCompanyEditForm','CompanyController@getEditForm')->name('getCompanyEditForm')->middleware(['setTheme:'.$theme])->middleware('auth');
Route::post('/updateCompany','CompanyController@updateCompany')->name('updateCompany')->middleware(['setTheme:'.$theme])->middleware('auth');

