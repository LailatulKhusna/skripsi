<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function field()
    {
        return $this->belongsTo('App\Models\Field');
    }

    public function question_list()
    {
        return $this->belongsTo('App\Models\QuestionList');
    }

    public function answer()
    {
        return $this->hasMany('App\Models\Answer'); 
    }
}
