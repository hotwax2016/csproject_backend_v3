<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    public function guideToUser()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function guideToEvent() 
    {
        return $this->hasMany('App\Event');
    }

    public function guideToPost()
    {
        return $this->hasOne('App\Post');
    }

    public function guideToDestination()
    {
        return $this->belongsTo('App\Destination', 'destination_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');;
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

}
