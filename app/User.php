<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token', 'isAdmin',
    ];
    protected $guarded = [
        'password', 'remember_token', 'isAdmin',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'userId');
    }

    public function givenTasks()
    {
        return $this->hasMany(Task::class, 'issuedById');
    }
}