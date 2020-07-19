<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $guarded = [];

    public function tourist()
    {
        return $this->belongsTo('App\Tourist');
    }

    public function locations()
    {
        return $this->belongsToMany('App\Location');
    }

    public function guide()
    {
        return $this->belongsTo('App\Guide');
    }
}
