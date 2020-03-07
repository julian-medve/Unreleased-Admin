<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeCategory extends Model
{
    protected $table = 'TypeCategory';
    protected $primaryKey= 'Id';

    public $timestamps = false; 

    public function CustomPattern()
    {
        return $this->hasMany('App\Models\CustomPattern');
    }
}
