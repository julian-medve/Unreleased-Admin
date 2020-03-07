<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingCost extends Model
{
    protected $table = 'ShippingCost';
    protected $primaryKey= 'Id';

    public $timestamps = false; 
}
