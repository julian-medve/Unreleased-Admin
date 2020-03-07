<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceCategory extends Model
{
    protected $table = 'PriceCategory';
    protected $primaryKey= 'Id';

    public $timestamps = false; 

    public function CustomPattern()
    {
        return $this->hasMany('App\Models\CustomPattern');
    }
}
