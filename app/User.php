<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userToTourist() 
    {
        return $this->hasOne('App\Tourist');
    }

    public function userToGuide() 
    {
        return $this->hasOne('App\Guide');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function follows() {
        return $this->belongsToMany('App\User', 'follows', 'user_id', 'following_user_id')
                    ->withTimestamps();
    }
}
