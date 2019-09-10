<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'var_slug', 'var_name',
    ];

    /**
     * Get the category  that owns the user.
     */
    public function categoriesAssigned()
    {
        return $this->hasMany('App\CategoryUser');
    }
}
