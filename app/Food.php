<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function foodCategory()
    {
        return $this->belongsTo('App\FoodCategory');
    }

    public function course()
    {
        return $this->hasMany('App\Course');
    }
}
