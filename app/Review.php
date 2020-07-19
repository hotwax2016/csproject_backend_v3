<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [];

    public function guide()
    {
        return $this->belongsTo('App\Guide');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
