<?php

namespace App;

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
        'name', 'email', 'password','company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Get the company that owns the user.
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    

    /**
     * Get the category  that owns the user.
     */
    public function categoriesAssigned()
    {
        return $this->hasMany('App\CategoryUser');
    }
}
