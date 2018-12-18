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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('test', 'TestController');

Route::resources([
    'articles' => 'ArticleController',
    'authors' => 'AuthorController',
    'interests' => 'InterestController'
]);

Route::get('/authors/{authorId}/interest', 'AuthorController@getAuthorInterest');
Route::get('/interests/{interestId}/author', 'InterestController@getInterestAuthor');
