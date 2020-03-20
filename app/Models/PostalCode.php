<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    protected $table = 'postal_code';
    protected $primaryKey= 'id';

    public $timestamps = false; 
}
