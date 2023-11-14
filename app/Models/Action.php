<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',
        'order_priority'
        
        
    ];

    public function users(){
        return $this->belongsToMany(User::class,'realiseractions')
        ->withTimestamps()
        ->withPivot('date_D', 'date_F');;
    }
}
