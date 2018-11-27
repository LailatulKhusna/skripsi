<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function session()
    {
        return $this->belongsTo('App\Models\Session');
    }

    public function field_list()
    {
        return $this->belongsTo('App\Models\FieldList');
    }

    public function question()
    {
        return $this->hasMany('App\Models\Question');
    }
}
