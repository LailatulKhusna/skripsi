<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function session()
    {
        return $this->belongsTo('App\Models\Session');
    }
    public function review_list()
    {
        return $this->belongsTo('App\Models\ReviewList');
    }
}
