<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public $table = "categorys";

    public function categoryToActivities() 
    {
        return $this->belongsToMany('App\Activity', 'activity_category');
    }
}
