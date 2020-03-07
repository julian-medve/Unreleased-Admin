<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'UserRole';
    public $timestamps = false; 

     /**
     * Get the User that owns the Notes.
     */
    public function User()
    {
        return $this->hasMany('App\User');
    }
}
