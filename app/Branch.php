<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function sessions(){
        return $this->hasMany('App\Models\Session');
    }

    public function users(){
        return $this->hasMany('App\Models\User');
    }

    public function field_lists(){
        return $this->hasMany('App\Models\Fieldlist');
    }

    public function review_lists(){
        return $this->hasMany('App\Models\Reviewlist');
    }
}
