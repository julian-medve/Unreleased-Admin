<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'OrderStatus';
    protected $primaryKey= 'Id';

    public $timestamps = false; 

    // public function CustomPattern()
    // {
    //     return $this->hasMany('App\Models\CustomPattern');
    // }
}
