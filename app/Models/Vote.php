<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';
    
    public $timestamps = false; // Table votes tidak memiliki created_at dan updated_at
    
    protected $fillable = [
        'kandidat_id',
        'voted_at',
    ];

    protected $casts = [
        'voted_at' => 'datetime',
    ];

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id', 'id');
    }
}
