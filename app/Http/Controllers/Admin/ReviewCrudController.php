<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ReviewRequest as StoreRequest;
use App\Http\Requests\ReviewRequest as UpdateRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class ReviewCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ReviewCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Review');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/review');
        $this->crud->setEntityNameStrings('review', 'reviews');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        

        $this->crud->addColumn([
            'name'=>'review_list_id',
            'label'=>'Review',
            'type'=>'select',
            'entity'=>'review_list',
            'attribute'=>'name',
            'model'=>'App\Models\ReviewList'
        ]);

        $this->crud->addColumn([
            'name'=>'session_id',
            'label'=>'Sesi',
            'type'=>'select',
            'entity'=>'session',
            'attribute'=>'name',
            'model'=>'App\Models\Session'
        ]);


         $this->crud->addColumn([
            'name'=>'name',
            'label'=>'Kritik dan Saran'
        ]);

        $this->crud->query->whereHas('session.branch',function($query){
            $query->where('id',Auth::user()->branch_id);
        });

        $this->crud->removeAllButtons();
        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in ReviewRequest
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
