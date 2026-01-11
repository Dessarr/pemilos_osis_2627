<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    
    protected $fillable = [
        'nama',
        'nip',
        'has_voted',
    ];

    protected $casts = [
        'has_voted' => 'boolean',
    ];
}
