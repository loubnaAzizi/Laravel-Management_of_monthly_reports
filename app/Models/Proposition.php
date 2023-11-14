<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposition extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description'
       
    ];

    public function user(){
        return $this->belongsTo(User::class)
        ->withTimestamps();
    }
}
