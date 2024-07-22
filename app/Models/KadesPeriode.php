<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KadesPeriode extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'kades_periode';

    //reference
    public function kades()
    {
        return $this->belongsTo(Kades::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
