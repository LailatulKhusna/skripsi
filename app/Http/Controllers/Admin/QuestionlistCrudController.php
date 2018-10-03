<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\QuestionlistRequest as StoreRequest;
use App\Http\Requests\QuestionlistRequest as UpdateRequest;

/**
 * Class QuestionlistCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class QuestionlistCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Questionlist');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/questionlist');
        $this->crud->setEntityNameStrings('questionlist', 'questionlists');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->addColumn([
            'name'=>'field_list_id',
            'label'=>'Daftar Bidang'
        ]);

        $this->crud->addColumn([
            'name'=>'name',
            'label'=>'Kuisioner'
        ]);

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in QuestionlistRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
