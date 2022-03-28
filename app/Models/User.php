<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','login','lastname','firstname','patronymic','tel','birthdate','iin','registration_address','residential_address','gender_id','nationality_id','remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUserName(){
        return "{$this->lastname} {$this->firstname}";
    }
    public function roles(){
        return $this->belongsToMany(Role::class, 'users_roles');
    }
    public function isAdmin():bool{
        return $this->roles()->allRelatedIds()->contains(1);
    }
    public function isUser():bool{
        return $this->roles()->allRelatedIds()->contains(2);
    }
    public function gender(){
        return $this->belongsTo(Gender::class);
    }
    public function nationality(){
        return $this->belongsTo(Nationality::class);
    }
}
