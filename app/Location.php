<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];

    public function locationToDestination()
    {
        return $this->belongsTo('App\Destination', 'destination_id');
    }

    public function locationToActivity()
    {
        return $this->belongsTo('App\Activity', 'activity_id');
    }

    public function appointments() 
    {
        return $this->belongsToMany('App\Appointment');
    }
}
