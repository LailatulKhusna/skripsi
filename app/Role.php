<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    public function user()
    {
    	return $this->hasOne('App\Biodata');
    }

    public function branch()
    {
    	return $this->belongsTo('App\Branch');
    }
}
