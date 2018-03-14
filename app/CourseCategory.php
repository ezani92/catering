<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    public function set()
    {
     	return $this->belongsTo('App\Set');
    }

    public function courses()
    {
    	return $this->hasMany('App\Course');
    }
}
