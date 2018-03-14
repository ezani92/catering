<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false;

    public function course_category()
    {
     	return $this->belongsTo('App\CourseCategory');
    }

    public function food()
    {
    	return $this->belongsTo('App\Food');
    }
}
