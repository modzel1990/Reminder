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

//Views
Route::get('/', function()
{
    return view('pages.home');
});
// Route::get('/', function()
// {
//     $redis = app()->make('redis');
//     $redis->set("key1", "testValue");
//     return $redis->get("key1");
// });
Route::get('about', function()
{
    return view('pages.about');
});
Route::get('portfolio', function()
{
    return view('pages.portfolio');
});
Route::get('contact', function()
{
    return view('pages.contact');
});

Route::get('portfolio-add', function()
{
    return view('pages.portfolio.portfolio-add');
})->middleware('auth', 'admin');

Route::get('portfolio-edit', function()
{
    return view('pages.portfolio.portfolio-edit');
})->middleware('auth', 'admin');

// Errors
Route::get('authentication-error', function() {
    return view('errors.authentication-error');
});

// Controllers
Route::get('/portfolio', 'PortfolioController@index');
Route::get('/portfolio-add', 'PortfolioController@create')->middleware('auth', 'admin');
Route::post('/portfolio-add', 'PortfolioController@store')->name('portfolio.add')->middleware('auth', 'admin');
Route::get('/portfolio-edit/{id}', 'PortfolioController@edit')->name('portfolio.edit')->middleware('auth', 'admin');
Route::post('/portfolio-edit/{id}', 'PortfolioController@update')->name('portfolio.update')->middleware('auth', 'admin');
Route::get('/portfolio-delete/{id}', 'PortfolioController@destroy')->name('portfolio.delete')->middleware('auth', 'admin');

// Resources

// You can pass more than one resource controller as an array
// Example:
// Route::resource([
//    'photos' => 'PhotoController',
//    'news' => 'NewsController'
// ]);
Route::resource('photos', 'PhotoController'); // That should make route for all actions such as GET, POST, PUT, DELETE

// Authentication
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
