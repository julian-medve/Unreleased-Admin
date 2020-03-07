<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomPattern extends Model
{
    protected $table = 'CustomPattern';
    protected $primaryKey= 'Id';

    public $timestamps = false; 

     /**
     * Get the User that owns the Notes.
     */
    public function User()
    {
        return $this->belongsTo('App\User', 'Submitter');
    }

    public function PriceCategory()
    {
        return $this->belongsTo('App\Models\PriceCategory', 'PriceCategory');
    }

    public function TypeCategory()
    {
        return $this->belongsTo('App\Models\TypeCategory', 'TypeCategory');
    }
}
