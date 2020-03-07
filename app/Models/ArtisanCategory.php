<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtisanCategory extends Model
{
    protected $table = 'ArtisanCategory';
    protected $primaryKey= 'Id';

    public $timestamps = false; 

     /**
     * Get the User that owns the Notes.
     */
    public function User()
    {
        return $this->belongsTo('App\User', 'Submitter');
    }
}
