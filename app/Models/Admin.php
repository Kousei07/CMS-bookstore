<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins'; // Optional, only if the table name differs from the default
    protected $fillable = [
        'username', 'email', 'password', // Add any other fields you want to be mass assignable
    ];

    // If you have password hashing logic, include it here:
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
