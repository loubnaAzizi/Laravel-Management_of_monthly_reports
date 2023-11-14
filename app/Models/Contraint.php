<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contraint extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'sujet',
        'description'
        
        
    ];

    public function activite(){
        return $this->belongsTo(Activite::class);
    }
}
