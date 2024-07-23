<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table = 'periode';

    protected $guarded = [];

    // reference

    public function kades()
    {
        return $this->belongsToMany(Kades::class, 'kades_periode', 'periode_id', 'kades_id');
    }


    
}
