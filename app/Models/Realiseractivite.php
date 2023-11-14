<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realiseractivite extends Model
{
    use HasFactory;
    protected $fillable = [
        'activites_id',
        'users_id',
        'date_D',
        'date_F',  
        
    ];
}
