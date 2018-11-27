<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public function branch(){
        return $this->belongsTo('App\Models\Branch');
    }

    public function review()
    {
        return $this->hasOne('App\Models\Review');
    }

    public function field()
    {
        return $this->hasMany('App\Models\Review');
    }
}
