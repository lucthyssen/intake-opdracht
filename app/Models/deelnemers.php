<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deelnemers extends Model
{
    protected $deelnemers = 'deelnemers';
    use HasFactory;
    
    // mass insert
    Protected $guarded = [];

    // dont try to input created_at and updated_at columns in table
    public $timestamps = false;
}
