<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::resource('articles', 'ArticleController');
Route::apiResources([
    'articles' => 'ArticleController',
    'authors' => 'AuthorController',
    'interests' => 'InterestController'
]);

Route::get('/authors/{authorId}/interest', 'AuthorController@getAuthorInterest');
Route::get('/interests/{interestId}/author', 'InterestController@getInterestAuthor');
