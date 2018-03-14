<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Set extends Model
{
    use SoftDeletes;
    use Sluggable;

     protected $dates = ['deleted_at'];

     public function package()
     {
     	return $this->belongsTo('App\Package');
     }

    public function course_categories()
    {
    	return $this->hasMany('App\CourseCategory');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
