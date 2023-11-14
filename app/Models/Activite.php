<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'intitulé',
        
        'description',

        
    ];

    public function contraints(){
        return $this->hasMany(Contrainte::class);
    }

    public function users(){
        return $this->belongsToMany(User::class,'realiseractivites','activite_id','user_id')
        ->withTimestamps()
        ->withPivot('date_D', 'date_F');
    }
}
