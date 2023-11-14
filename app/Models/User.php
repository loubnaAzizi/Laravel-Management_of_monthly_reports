<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'CIN',
        'role',
        'N_SOM',
        'services_id',
        'statue',
        'emailPrson',
        'grade',
        'telephon',
    ];

    public function service(){
        return $this->belongsTo(Service::class,'services_id','id');
    }

    public function propositions(){
        return $this->hasMany(Proposition::class)
        ->withTimestamps();
    }

    public function activites(){
        return $this->belongsToMany(Activite::class,'realiseractivites','user_id','activite_id')
        ->withTimestamps()
        ->withPivot('date_D', 'date_F');
    }

    public function actions(){
        return $this->belongsToMany(Action::class,'realiseractions')
        ->withTimestamps()
        ->withPivot('date_D', 'date_F');
    }

    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
