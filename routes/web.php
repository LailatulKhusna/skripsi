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
    return redirect('admin/login');
});

Route::get('/admin',function(){
	return redirect('admin/login');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){
	Route::get('beranda','DashboardController@index');
	Route::resources([
		"branchs"=>"BranchController",
		"roles"=>"RoleController",
		"users"=>"UserController",
		"biodatas"=>"BiodataController",
		"fieldlists"=>"FieldListController",
		"questionlists"=>"QuestionListController",
		"sessions"=>"SessionController",
		"fields"=>"FieldController",
		"questions"=>"QuestionController",
		"answers"=>"AnswerController",
		"reviewlists"=>"ReviewListController",
		"reviews"=>"ReviewController"
	]);

	Route::apiResources([
		'apisessions'=>'API\SessionController'
	]);
});

