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

Route::get('/', array(
  'as' => '/',
  'uses' => 'HomeController@fundraisers'
));

Route::get('/home', function () {
  return view('/home');
});

Route::get('/about', function () {
  return view('about');
});

Route::get('/contact', function () {
  return view('contact');
});

Route::get('/review/{id}', array(
  'as' => 'review/',
  'uses' => 'HomeController@find'
  ));

Route::post('/add_rating/', [
  'as' => 'add_rating',
  'uses' => 'RatingController@addRating'
]);
