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
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){
	Route::resources([
		"branchs"=>"BranchController",
		"roles"=>"RoleController",
		"users"=>"UserController",
		"biodatas"=>"BiodataController",
		"fieldlists"=>"FieldListController",
		"questionlists"=>"QuestionLitsController",
		"sessions"=>"SessionController",
		"fields"=>"FieldController",
		"questions"=>"QuestionController",
		"answers"=>"AnswerController",
		"reviewlists"=>"ReviewListController",
		"reviews"=>"ReviewController"
	]);
});

