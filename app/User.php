<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Cartalyst\Sentinel\Users\EloquentUser as CustomUser;

class User extends CustomUser
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

//    public function setPasswordAttribute($value)
//    {
//        $this->attributes['password'] = bcrypt($value);
//    }
}
