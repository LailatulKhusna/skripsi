<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldList extends Model
{
   public function branch(){
        return $this->belongsTo('App\Models\Branch');
    }

    public function question_lists()
    {
        return $this->hasMany('App\Models\QuestionList');
    }

    public function field()
    {
        return $this->hasMany('App\Models\Field');
    }
}
