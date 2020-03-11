<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'Order';
    protected $primaryKey= 'Id';

    public $timestamps = false; 

    public function User()
    {
        return $this->belongsTo('App\User', 'UserId');
    }

    public function Address()
    {
        return $this->belongsTo('App\Models\Address', 'AddressIndex');
    }

    public function OrderStatus()
    {
        return $this->belongsTo('App\Models\OrderStatus', 'Status');
    }
}
