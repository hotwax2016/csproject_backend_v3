<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tourist extends Model
{
    protected $guarded = [];

    public function touristToUser()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function touristToEvents()
    {
        return $this->belongsToMany('App\Event', 'event_tourist');
    }
}
