<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Auth;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SessionRequest as StoreRequest;
use App\Http\Requests\SessionRequest as UpdateRequest;

/**
 * Class SessionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SessionCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Session');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/session');
        $this->crud->setEntityNameStrings('session', 'sessions');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
    
        $this->crud->addField([
            'name'=>'branch_id',
            'label'=>'Cabang',
            'type'=>'select',
            'entity'=>'branch',
            'attribute'=>'name',
            'model'=>'App\Models\Branch'
        ]);

        $this->crud->addColumn([
            'name'=>'branch_id',
            'label'=>'Cabang',
            'type'=>'select',
            'entity'=>'branch',
            'attribute'=>'name',
            'model'=>'App\Models\Branch'
        ]);

        $this->crud->addColumn([
            'name'=>'name',
            'label'=>'Sesi'  
        ]);

        $this->crud->query->where('branch_id',Auth::user()->branch_id);

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in SessionRequest
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
