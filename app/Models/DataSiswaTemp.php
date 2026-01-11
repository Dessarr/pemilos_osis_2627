<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSiswaTemp extends Model
{
    protected $table = 'data_siswa_temp';
    
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
}
