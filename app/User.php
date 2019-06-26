<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    const ADMIN = 3;
    const CLIENT = 1;
    const AGENT = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function client()
    {
        return self::where('role_id',self::CLIENT);
    }

    public static function agent()
    {
        return self::where('role_id',self::AGENT);
    }
}
