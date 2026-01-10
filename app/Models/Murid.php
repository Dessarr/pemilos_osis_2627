<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Murid extends Authenticatable
{
    use Notifiable;

    protected $table = 'murid';
    
    public $timestamps = false; // Table murid tidak memiliki created_at dan updated_at
    
    protected $fillable = [
        'nama',
        'kelas',
        'nis',
        'nisn',
        'has_voted',
    ];

    protected $casts = [
        'has_voted' => 'boolean',
    ];

    protected $hidden = [
        // No password field needed
    ];
}
