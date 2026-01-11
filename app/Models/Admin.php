<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';
    
    public $timestamps = false;
    
    protected $fillable = [
        'nama',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
