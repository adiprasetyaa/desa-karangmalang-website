<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kades extends Model
{
    use HasFactory;

    protected $table = 'kades';

    protected $guarded = [];

    // reference
    public function people()
    {
        return $this->belongsTo(People::class);
    }

    public function periode()
    {
        return $this->belongsToMany(Periode::class, 'kades_periode', 'kades_id', 'periode_id');
    }

    public function periodeActive()
    {
        return $this->periode()->where('start_at', '<=', now())->where('end_at', '>=', now());
    }


}
