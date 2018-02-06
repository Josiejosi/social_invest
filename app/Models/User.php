<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'surname', 
        'country', 
        'is_verified', 
        'verification_code', 
        'cell_phone_number', 
        'referral_code', 
        'is_avtive', 
        'avatar', 
        'is_online', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function account()
    {
        return $this->hasMany( Account::class ) ;
    }

    public function crpyto()
    {
        return $this->hasMany( Crpyto::class ) ;
    }
}
