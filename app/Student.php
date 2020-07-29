<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $table = 'Student';

    protected $guarded = ['id', 'remember_token'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}