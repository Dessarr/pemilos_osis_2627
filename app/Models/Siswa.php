<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'siswa';
    
    public $timestamps = false;
    
    protected $fillable = [
        'nis',
        'password',
        'nama',
        'kelas',
    ];

    protected $hidden = [
        'password',
    ];

    public function vote()
    {
        return $this->hasOne(Vote::class, 'nis', 'nis');
    }
}
