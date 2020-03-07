<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtisanProduct extends Model
{
    protected $table = 'ArtisanProduct';
    protected $primaryKey= 'Id';

    public $timestamps = false; 

     /**
     * Get the User that owns the Notes.
     */
    public function User()
    {
        return $this->belongsTo('App\User', 'Submitter');
    }

    public function ArtisanCategory()
    {
        return $this->belongsTo('App\Models\ArtisanCategory', 'ArtisanCategory');   
    }
}
