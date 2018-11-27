<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionList extends Model
{
    public function field_list(){
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

}
