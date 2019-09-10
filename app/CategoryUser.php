<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories_users';

    /**
     * Get the company that owns the user.
     */
    public function categories()
    {
   		return $this->belongsTo('App\Category');
    }
}
