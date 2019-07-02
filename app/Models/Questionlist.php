<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Support\Facades\Auth;

class QuestionList extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'question_lists';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = ['field_list_id','name'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function openGoogle($crud = false)
    {
        return '<a class="btn btn-xs btn-default" href="/questionlists/create" data-toggle="tooltip" title="Just a demo custom button."><i class="fa fa-plus"></i> Create Question List</a>';
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function field_list()
    {
        return $this->belongsTo('App\Models\FieldList','field_list_id','id');
    }

    public function question()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function question_lists()
    {
        return $this->hasMany('App\Models\QuestionList');
    }



    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    public function scopeBranch(Builder $builder, Model $model)
    {
        $builder->whereHas('field_list.branch',function($query){
            $query->where('id',Auth::user()->branch_id);
        });
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
