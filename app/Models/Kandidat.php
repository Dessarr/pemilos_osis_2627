<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $table = 'kandidat';
    
    public $incrementing = false;
    protected $keyType = 'integer';
    
    protected $fillable = [
        'id',
        'nama',
        'gambar',
        'ketos_nama',
        'ketos_kelas',
        'ketos_biodata',
        'ketos_foto',
        'waketos_nama',
        'waketos_kelas',
        'waketos_biodata',
        'waketos_foto',
        'visi',
        'misi',
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class, 'kandidat_id', 'id');
    }
}
