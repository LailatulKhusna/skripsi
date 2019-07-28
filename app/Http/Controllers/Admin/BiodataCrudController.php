<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Auth;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\BiodataRequest as StoreRequest;
use App\Http\Requests\BiodataRequest as UpdateRequest;

/**
 * Class BiodataCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class BiodataCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Biodata');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/biodata');
        $this->crud->setEntityNameStrings('biodata', 'biodatas');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->query->whereHas('user',function($query){
            $query->where('branch_id',Auth::user()->branch_id);
        });


        $this->crud->removeColumn('name');
        $this->crud->addColumn([
            'name'=>'user_id',
            'label'=>'nama',
            'type'=>'select',
            'entity'=>'user',
            'attribute'=>'name',
            'model'=>'App\Models\User'
        ]);

        $this->crud->addColumn([
            'name'=>'gender',
            'label'=>'Jenis Kelamin'
        ]);

        $this->crud->addColumn([
            'name'=>'position',
            'label'=>'Jabatan'
        ]);
        
        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in BiodataRequest
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
