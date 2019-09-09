<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
     /**
     * Get the user for the company.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
