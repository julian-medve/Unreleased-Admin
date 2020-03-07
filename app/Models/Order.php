<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'Order';
    protected $primaryKey= 'Id';

    public $timestamps = false; 
}
