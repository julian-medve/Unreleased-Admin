<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'Address';
    protected $primaryKey= 'Id';

    public $timestamps = false; 

    public function User()
    {
        return $this->belongsTo('App\User', 'UserId');
    }
}
