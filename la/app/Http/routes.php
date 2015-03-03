<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('book','BookController@alluserBook');
Route::post('findbook','BookController@findBook');

Route::get('delete_book', function()
{
    return view('auth.delete_book');

});
Route::get('insert_book', function()
{
    return view('auth.insert_book');

}); 
Route::post('delete_book','BookController@deleteBook');
Route::post('insert_book','BookController@insertBook');
Route::get('logout',function()
  {
    Auth::logout();
    return Redirect::to('auth/login');
});
Route::get('user_book','BookController@userBook');
Route::get('borrow/{name}/{isbn}','BookController@borrow');
Route::get('back/{name}/{isbn}','BookController@back');
