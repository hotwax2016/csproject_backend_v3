<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];

    public function activityToLocations()
    {
        return $this->hasMany('App\Location');
    }

    public function activityToCategories()
    {
        return $this->belongsToMany('App\Category', 'activity_category');
    }
}
