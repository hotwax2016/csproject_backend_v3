<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $guarded = [];

    /* public function destinationToActivities()
    {
        return $this->belongsToMany('App\Activity', 'activity_destination');
    } */

    public function destinationToGuides()
    {
        return $this->hasMany('App\Guide');
    }

    public function destinationToLocations()
    {
        return $this->hasMany('App\Location');
    }
}
