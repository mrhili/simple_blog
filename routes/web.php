<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
L8: COMMENT THE INDEX welcom VIEW
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();
/*
L7: CHANGING THE INDEX(/) ROOT FROM HomeController TO PostController
AND CHANGE THE /home TO /
*/
Route::get('/', 'PostController@index');
/*
L7: CHANGING THE INDEX(/) ROOT FROM HomeController TO PostController
AND CHANGE THE /home TO /
*/
Route::resource('/posts', 'PostController');


/*
    *L37: CREATING THE ROOT FOR THE SLUG
    */
Route::get('b/{slug}', 'BController@slug')->name('slug');


/*
L41: MAKING TE ROOT AND LINKING TAGS PAGE TO THE TAG CONTROLLER
*/
Route::resource('tags', 'TagController');

/*
L74: MAKING TE ROOT AND LINKING CATEGORY PAGE TO THE TAG CONTROLLER
*/
Route::resource('categories', 'CategoryController');


Route::resource('cat', 'CatController');


/*
L123: MAKING TE ROOT AND LINKING CATEGORY PAGE TO THE TAG CONTROLLER
*/
Route::get('profile/{id}', 'ProfileController@profile')->name('profile')->middleware('auth');


/*
L129: MAKING ROOT OF FAVORITES
*/
Route::get('profile/{id}/favorites', 'ProfileController@favorite')->name('favorites')->middleware('auth');

Route::post('profile/{id}/favorites', 'ProfileController@store')->name('favorites.store');

/*
L131: MAKING THE DELETE CONTROLLER
*/
Route::delete('profile/{uid}/favorites/{pid}', 'ProfileController@destroy')->name('removeFavorites');


/*
    L153: ROOT TO STORE COMMENT
*/

Route::post('comments/{pid}/', 'CommentController@store')->name('comments.store');
