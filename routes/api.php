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
    return $request->user()->load('role','branch.field_lists.question_list','branch.review_lists','biodata');
});
Route::apiResource('oauthclients','API\OauthClientController');

Route::group(['middleware'=>'auth:api','namespace'=>'API'],function(){
	Route::apiResources([
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

});