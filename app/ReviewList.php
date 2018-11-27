<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewList extends Model
{
    public function branch(){
        return $this->belongsTo('App\Models\Branch');
    }

    public function review()
    {
        return $this->hasMany('App\Models\Review');
    }
}
