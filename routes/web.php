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

use App\Http\Middleware\AuthMiddleware;

/* Route::get('/', function () {
    return view('hello.landing');
}); */

//確認
Route::get('searchResult', function () {
    return view('hello.searchResult');
});

Route::get('regist','HelloController@regist');

Route::post('confirm','HelloController@post');

Route::post('complete','UserController@complete');

Route::get('/','UserController@login');

Route::post('login_check','UserController@login_check');

Route::middleware(AuthMiddleware::class)->group(function(){

    Route::get('top','MichelController@top');

    Route::get('logout','UserController@logout');

    Route::get('submit','MichelController@submit');

    Route::get('mypage','UserController@mypage');

    Route::get('edit','UserController@edit');

    Route::post('edit','UserController@edit');

    Route::post('editComplete','UserController@editComplete');

    Route::get('dmList','UserController@dmList');

    Route::post('dm','UserController@dm');

    Route::get('dm','UserController@dm');

    Route::post('dmSubmit','UserController@dmSubmit');

    Route::post('assessment','UserController@assessment');

    Route::get('assessment','UserController@assessment');

    Route::post('assessmentComplete','UserController@assessmentComplete');




    // 村瀬

    //投稿フォームページ
    Route::get('solution', 'SolutionController@showCreateForm')->name('solutions.create');
    Route::post('solution', 'SolutionController@create');

    //投稿詳細ページ
    Route::get('detail', 'SolutionController@detail')->name('solutions.detail');
    Route::get('apply', 'SolutionController@apply');




    // 溝越



});



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
