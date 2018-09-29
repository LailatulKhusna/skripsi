<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('user', 'UserCrudController');
    CRUD::resource('branch', 'BranchCrudController');
    CRUD::resource('role', 'RoleCrudController');
    CRUD::resource('biodata', 'BiodataCrudController');
    CRUD::resource('fieldlist', 'FieldlistCrudController');
    CRUD::resource('questionlist', 'QuestionlistCrudController');
    CRUD::resource('session', 'SessionCrudController');
    CRUD::resource('field', 'FieldCrudController');
    CRUD::resource('question', 'QuestionCrudController');
    CRUD::resource('answer', 'AnswerCrudController');
    CRUD::resource('reviewlist', 'ReviewlistCrudController');
    CRUD::resource('review', 'ReviewCrudController');
}); // this should be the absolute last line of this file